<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $primaryKey = 'ingredient_id';
    protected $fillable = [
        'ingredient_name',
        'ingredient_description',
    ]; 

    public function products()

    {
        return $this->belongsToMany(Product::class, 'ingredient_product', 'ingredient_id', 'product_id');
    }
}
