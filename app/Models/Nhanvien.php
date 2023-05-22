<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    protected $table = 'nhanvien';

    protected $fillable = ['idnv','ten','gioitinh','cccd','ngaybdlam','luong','thuong','chucvu'];
    public $timestamps = false;
}
