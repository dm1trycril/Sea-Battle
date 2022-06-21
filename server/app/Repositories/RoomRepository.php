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

        if ($room->turn == $room->first_user_id) {
            $room->turn = $room->second_user_id;
        } else {
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

        if ($room->first_user_id == $user_id) {
            return $room->first_user_gamefield_id;
        }
        if ($room->second_user_id == $user_id) {
            return $room->second_user_gamefield_id;
        }
        throw new Exception('Error: user not belongs to this room');
    }

    public function GetOpponentFieldId($room_id, $user_id)
    {
        $room = Room::where('id', $room_id)->first();

        if ($room->first_user_id == $user_id) {
            return $room->second_user_gamefield_id;
        }
        if ($room->second_user_id == $user_id) {
            return $room->first_user_gamefield_id;
        }
        throw new Exception('Error: user not belongs to this room');
    }

    public function GetCell($gamefield_id, $x)
    {
        $gamefield = Gamefield::where('id', $gamefield_id)->first()->gamefield;
        return $gamefield[$x];
    }

    public function SetCell($gamefield_id, $x, $cell_status)
    {
        $gamefield = Gamefield::where('id', $gamefield_id)->first();

        $gamefield_value = $gamefield->gamefield;
        $gamefield_value[$x] = $cell_status;
        $gamefield->gamefield = $gamefield_value;

        $gamefield->save();
    }

    public function MakeShot($room_id, $user_id, $x)
    {
        if (!$this->CanMakeMove($room_id, $user_id)) {
            return  ['status' => 'error', 'error' => 'cannot_move'];
        }

        $gamefield_id = $this->GetOpponentFieldId($room_id, $user_id);

        $cell_status = $this->GetCell($gamefield_id, $x);

        if ($cell_status == 0) {
            $this->SetCell($gamefield_id, $x, 2);
            $this->SwitchTurn($room_id);
            return ['status' => 'ok'];
        } else if ($cell_status == 1) {
            $this->SetCell($gamefield_id, $x, 2);
            $this->SwitchTurn($room_id);
            return ['status' => 'ok'];
        }

        return  ['status' => 'error', 'error' => 'bad_parameters'];
    }

    public function GetGamefield($room_id, $user_id)
    {
        $gamefield_id = $this->GetFieldId($room_id, $user_id);
        $gamefield = Gamefield::where('id', $gamefield_id)->first()->gamefield;
        return $gamefield;
    }

    public function CreateEmptyGamefield()
    {
        $gamefield = new Gamefield();
        $gamefield->gamefield = [];
        $gamefield->save();
        return $gamefield->id;
    }

    public function GetUserId($login) // Need to rename
    {
        $user = User::where('login', $login)->first();
        return $user->id;
    }

    public function GetOpponentId($room_id, $login) // Need to rename
    {
        $user_id = $this->GetUserId($login);

        $room = Room::where('id', $room_id)->first();

        if ($room->first_user_id == $user_id) {
            return $room->second_user_id;
        }
        if ($room->second_user_id == $user_id) {
            return $room->first_user_id;
        }
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

    public function SwitchReadyFlag($room_id)
    {
        $room = Room::where('id', $room_id)->first();
        $room->one_user_ready = !$room->one_user_ready;
        $room->save();
        return $room->one_user_ready;
    }

    public function SetGamefield($gamfield_id, $new_gamefield)
    {
        $gamefield = Gamefield::where('id', $gamfield_id)->first();
        $gamefield->gamefield = $new_gamefield;
        $gamefield->save();
    }

    public function UserReady($room_id, $login, $gamefield)
    {
        $gamefield_id = $this->GetFieldId($room_id, $this->GetUserId($login));

        $this->SetGamefield($gamefield_id, $gamefield);

        $ready_flag = $this->SwitchReadyFlag($room_id);

        if (!$ready_flag) {
            Room::where('id', $room_id)->update(['status_name' => 3]);  // code 3 means "game"
        }

        return $ready_flag;
    }

    public function UserJoin($room_id, $login)
    {
        Room::where('id', $room_id)->update(['second_user_id' => $this->GetUserId($login), 'second_user_gamefield_id' => $this->CreateEmptyGamefield()]);
    }

    public function IsOtherUserJoined($room_id)
    {
        $room = Room::where('id', $room_id)->first();
        if ($room->second_user_id == null) {
            return false;
        }
        return true;
    }

    public function IsOtherUserReady($room_id, $login)
    {
        $gamefield = $this->GetGamefield($room_id, $this->GetOpponentId($room_id, $login));
        if ($gamefield == []) {
            return false;
        }
        return true;
    }

    public function IsOtherUserShot($room_id, $login)
    {
        $room = Room::where('id', $room_id)->first();
        $user_id = $this->GetUserId($login);
        return $this->WhoseTurn($room_id) == $user_id;
    }
}
