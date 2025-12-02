<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /** @use HasFactory<\Database\Factories\BagFactory> */
    use HasFactory;
    protected $fillable = ['brand', 'color', 'price', 'owner'];
}
