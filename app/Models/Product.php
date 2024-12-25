<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    // Add fillable property
    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'how_to_use',
        'product_ingredients',
        'product_image',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_product', 'product_id', 'ingredient_id');
    }
}

