<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoivien extends Model
{
    protected $table = 'hoivien';
    protected $fillable = ['sothe', 'tenhv', 'ngaysinh', 'diachi', 'dienthoai', 'socccd', 'diemtl', 'loaihv'];
}
