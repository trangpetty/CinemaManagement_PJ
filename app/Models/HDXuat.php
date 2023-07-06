<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDXuat extends Model
{
    protected $table = 'hdxuat';
    protected $fillable = ['idhdxuat', 'idnv', 'sothe', 'giamgia', 'ngaylaphd', 'giolaphd'];
}
