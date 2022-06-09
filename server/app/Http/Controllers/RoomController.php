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
        $user_id = (int)$request->get('user_id');
        $x = (int)$request->get('x');
        $y = (int)$request->get('y');

        return response()->json($this->roomRepo->MakeShot($room_id, $user_id, $x, $y));
    }
    
    public function GetGamefield(Request $request)
    {
        $room_id = (int)$request->get('room_id');
        $user_id = (int)$request->get('user_id');

        return response()->json($this->roomRepo->GetGamefield($room_id, $user_id));
    }

    public function CreateRoom(Request $request)
    {
        $user_id = (int)$request->get('user_id');
        $room_id = $this->roomRepo->CreateRoom($user_id);
        return response()->json($room_id);
    }
}
