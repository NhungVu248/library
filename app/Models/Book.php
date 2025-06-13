<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     use HasFactory;

    protected $fillable = [
        'bookname', 'author', 'publisher', // Add the fields you want to allow
    ];
}
