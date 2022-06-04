<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gamefield extends Model
{
    use HasFactory;

    protected $table = "gamefields";

    protected $fillable = [
        'gamefield'
    ];

    protected $casts = [
        'gamefield' => 'array'
    ];
}
