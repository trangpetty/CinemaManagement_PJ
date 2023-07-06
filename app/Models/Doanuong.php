<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doanuong extends Model
{
    protected $table = 'doanuong';
    protected $fillable = ['iddoanuong', 'ten', 'hsd', 'phanloai', 'gia', 'soluong'];
}
