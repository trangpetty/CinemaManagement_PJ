<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sochamcong extends Model
{
    protected $table = 'sochamcong';
    protected $fillable = ['idnv', 'ngaydilam', 'calam'];
}
