<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */

    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'user_id'];

    protected $dates = ['deleted_at'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
