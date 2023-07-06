<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHDNhap extends Model
{
    protected $table = 'cthdnhap';
    protected $fillable = ['idhdnhap', 'iddoanuong', 'soluong', 'dongia'];
}
