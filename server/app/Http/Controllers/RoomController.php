<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;

use App\Interfaces\RoomRepositoryInterface;

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
}
