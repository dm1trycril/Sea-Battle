<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamestatus extends Model
{
    use HasFactory;

    protected $table = 'gamestatuses';

    protected $fillable = ['status_name'];
}
