<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $table = 'phim';
    protected $fillable = ['idphim','ten','thoiluong','theloai','daodien','dienvienchinh','sovekhadung'];
    public $timestamps = false;
}
