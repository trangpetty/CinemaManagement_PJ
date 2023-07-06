<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDNhap extends Model
{
    protected $table = 'hdnhap';
    protected $fillable = ['idhdnhap', 'idnv', 'ngaylaphd', 'giolaphd', 'chuthich'];
}
