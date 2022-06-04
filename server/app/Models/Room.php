<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'first_user_id',
        'second_user_id',
        'first_user_gamefield_id',
        'second_user_gamefield_id',
        'turn',
        'status_name'
    ];
}
