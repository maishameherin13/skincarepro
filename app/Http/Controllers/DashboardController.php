<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;
use App\Models\Ingredient;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the user has completed the quiz
        $result = Result::where('user_id', $user->id)->latest()->first();

        $ingredients = [];
        $tips = [];

        if ($result) {
            // Decode ingredients from JSON into an array
            $ingredient_names = is_string($result->ingredients) ? json_decode($result->ingredients, true) : $result->ingredients;

            // Fetch ingredients and their descriptions from the database
            $ingredients = Ingredient::whereIn('ingredient_name', $ingredient_names)
                ->get(['ingredient_name', 'ingredient_description']); // Select only relevant columns

            // Decode tips from JSON into an array
            $tips = is_string($result->tips) ? json_decode($result->tips, true) : $result->tips;
        }

        return view('dashboard', compact('result', 'ingredients', 'tips'));
    }
}

