<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;

use App\Interfaces\RoomRepositoryInterface;
use GuzzleHttp\Psr7\Message;

class RoomController extends Controller
{
    private RoomRepositoryInterface $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function MakeShot(Request $request)
    {
        $room_id = (int)$request->get('room_id');
        $user_id = $this->roomRepo->GetUserId($request->get('login'));
        $x = (int)$request->get('x');
        return response()->json($this->roomRepo->MakeShot($room_id, $user_id, $x));
    }

    public function CreateRoom(Request $request)
    {
        $login = $request->get('login');
        $room_id = $this->roomRepo->CreateRoom($login);
        return response()->json([
            "room_id" => $room_id
        ]);
    }

    public function UserReady(Request $request)
    {
        ['room_id' => $room_id, 'login' => $login, 'gamefield' => $gamefield] = $request->all();

        $ready_flag = $this->roomRepo->UserReady($room_id, $login, $gamefield);

        if ($ready_flag) {
            return response()->json([
                "status" => "ok",
                "message" => "should_wait",
            ]);
        } else {
            return response()->json([
                "status" => "ok",
                "message" => "start_game"
            ]);
        }
    }

    public function UserJoin(Request $request)
    {
        ['room_id' => $room_id, 'login' => $login] = $request->all();

        $this->roomRepo->UserJoin($room_id, $login);

        return response()->json([
            "status" => "ok",
            "message" => "user_joined"
        ]);
    }

    public function IsOtherUserJoined(Request $request)
    {
        $joined_flag = $this->roomRepo->IsOtherUserJoined($request->get('room_id'));
        if ($joined_flag) {
            return response()->json([
                "status" => "ok",
                "message" => "user_joined"
            ]);
        } else {
            return response()->json([
                "status" => "ok",
                "message" => "should_wait",
            ]);
        }
    }

    public function IsOtherUserReady(Request $request)
    {
        ['room_id' => $room_id, 'login' => $login] = $request->all();
        $ready_flag = $this->roomRepo->IsOtherUserReady($room_id, $login);
        if($ready_flag)
        {
            return response()->json([
                "status" => "ok",
                "message" => "start_game"
            ]);
        }
        else
        {
            return response()->json([
                "status" => "ok",
                "message" => "should_wait",
            ]);
        }
    }

    public function IsOtherUserShot(Request $request)
    {
        ['room_id' => $room_id, 'login' => $login] = $request->all();
        $shot_flag = $this->roomRepo->IsOtherUserShot($room_id, $login);
        if($shot_flag)
        {
            return response()->json([
                "status" => "ok",
                "message" => "your_turn",
                "gamefield" => $this->roomRepo->GetGamefield($room_id, $this->roomRepo->GetUserId($login))
            ]);
        }
        else
        {
            return response()->json([
                "status" => "ok",
                "message" => "should_wait"
            ]);
        }
    }
}
