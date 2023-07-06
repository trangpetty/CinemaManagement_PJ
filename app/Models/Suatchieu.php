<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suatchieu extends Model
{
    protected $table = 'suatchieu';
    protected $fillable = ['idsuatchieu', 'thoigianbd', 'idphim', 'idphong', 'loaichieu'];
}
