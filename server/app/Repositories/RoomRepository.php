<?php

namespace App\Repositories;

use Exception;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;

use App\Models\Gamefield;
use App\Models\User;

class RoomRepository implements RoomRepositoryInterface
{
    public function WhoseTurn($room_id)
    {
        return Room::where('id', $room_id)->first()->turn;
    }

    public function SwitchTurn($room_id)
    {
        $room = Room::where('id', $room_id)->first();

        if ($room->turn == $room->first_user_id)
        {
            $room->turn = $room->second_user_id;
        }
        else
        {
            $room->turn = $room->first_user_id;
        }

        $room->save();
    }

    public function CanMakeMove($room_id, $user_id)
    {
        $room = Room::where('id', $room_id)->first();
        
        return $room->turn == $user_id;
    }

    public function GetFieldId($room_id, $user_id)
    {
        $room = Room::where('id', $room_id)->first();

        if ($room->first_user_id == $user_id)
        {
            return $room->first_user_gamefield_id;
        }
        if ($room->second_user_id == $user_id)
        {
            return $room->second_user_gamefield_id;
        }
        throw new Exception('Error: user not belongs to this room');
    }

    public function GetOpponentFieldId($room_id, $user_id)
    {
        $room = Room::where('id', $room_id)->first();

        if ($room->first_user_id == $user_id)
        {
            return $room->second_user_gamefield_id;
        }
        if ($room->second_user_id == $user_id)
        {
            return $room->first_user_gamefield_id;
        }
        throw new Exception('Error: user not belongs to this room');
    }

    public function GetCell($gamefield_id, $x, $y) {
        $gamefield = Gamefield::where('id', $gamefield_id)->first()->gamefield;

        return $gamefield[$x+$y*10];
    }

    public function SetCell($gamefield_id, $x, $y, $cell_status)
    {
        $gamefield = Gamefield::where('id', $gamefield_id)->first();

        $gamefield_value = $gamefield->gamefield;
        $gamefield_value[$x+$y*10] = $cell_status;
        $gamefield->gamefield = $gamefield_value;

        $gamefield->save();
    }

    public function MakeShot($room_id, $user_id, $x, $y) {
        if (!$this->CanMakeMove($room_id, $user_id))
        {
            return  ['status' => 'error', 'error' => 'cannot_move'];
        }

        $gamefield_id = $this->GetOpponentFieldId($room_id, $user_id);

        $cell_status = $this->GetCell($gamefield_id, $x, $y);

        if ($cell_status == 0)
        {
            $this->SetCell($gamefield_id, $x, $y, 2);
            $this->SwitchTurn($room_id);
            return ['status' => 'ok'];
        }
        else if ($cell_status == 1)
        {
            $this->SetCell($gamefield_id, $x, $y, 2);
            $this->SwitchTurn($room_id);
            return ['status' => 'ok'];
        }
        
        return  ['status' => 'error', 'error' => 'bad_parameters'];
    }

    public function GetGamefield($room_id, $user_id) {
        $gamefield_id = $this->GetFieldId($room_id, $user_id);
        $gamefield = Gamefield::where('id', $gamefield_id)->first()->gamefield;
        return $gamefield;
    }

    public function CreateEmptyGamefield() {
        $gamefield = new Gamefield();
        $gamefield->gamefield = array_fill(0, 100, 0);
        $gamefield->save();
        return $gamefield->id;
    }

    public function GetUserId($login) // Need to rename
    {
        $user = User::where('login', $login)->first();
        return $user->id;
    }

    public function CreateRoom($login)
    {
        $room = new Room();
        $room->first_user_id = $this->GetUserId($login);
        $room->first_user_gamefield_id = $this->CreateEmptyGamefield();
        $room->turn = $room->first_user_id;
        $room->status_name = 1; //code 1 means "awaiting"
        $room->save();
        return $room->id;
    }
}