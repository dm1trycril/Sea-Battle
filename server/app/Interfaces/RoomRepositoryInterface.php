<?php

namespace App\Interfaces;

interface RoomRepositoryInterface
{
    public function WhoseTurn($room_id);
    public function GetOpponentFieldId($room_id, $user_id);
    public function GetCell($gamefield_id, $x, $y);
    public function SetCell($gamefield_id, $x, $y, $cell_status);
    public function MakeShot($room_id, $user_id, $x, $y);
}