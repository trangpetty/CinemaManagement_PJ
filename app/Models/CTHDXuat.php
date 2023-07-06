<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHDXuat extends Model
{
    protected $table = 'cthdxuat';
    protected $fillable = ['idhdxuat', 'iddoanuong', 'soluong', 'dongia'];
}
