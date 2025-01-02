<?php

namespace App\Http\Controllers;


use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    // IngredientsController.php
    public function index()
    {
        $ingredients = Ingredient::all(); // Fetch all ingredients
        return response()->json($ingredients);
    }
}
