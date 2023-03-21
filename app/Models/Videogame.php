<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    protected $fillable=["title","price","available","image", ];

    use HasFactory;
}