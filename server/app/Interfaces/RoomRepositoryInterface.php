<?php

namespace App\Interfaces;

use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

interface RoomRepositoryInterface
{
    public function GetUserId($login);

    public function WhoseTurn($room_id);

    public function GetFieldId($room_id, $user_id);
    public function GetOpponentFieldId($room_id, $user_id);

    public function GetCell($gamefield_id, $x);
    public function SetCell($gamefield_id, $x, $cell_status);

    public function MakeShot($room_id, $user_id, $x);

    public function SetGamefield($gamfield_id, $gamefield);
    public function GetGamefield($room_id, $user_id);

    public function CreateEmptyGamefield();

    public function CreateRoom($login);

    public function SwitchReadyFlag($room_id);
    public function UserReady($room_id, $login, $gamefield);

}