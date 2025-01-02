<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the user has completed the quiz
        $result = Result::where('user_id', $user->id)->first();

        // Pass the user's quiz status to the dashboard view
        if ($result) {
            // Decode ingredients and tips if stored as JSON
            $ingredients = is_string($result->ingredients) ? json_decode($result->ingredients) : $result->ingredients;
            $tips = is_string($result->tips) ? json_decode($result->tips) : $result->tips;
        } else {
            $ingredients = null;
            $tips = null;
        }

        return view('dashboard', compact('result', 'ingredients', 'tips'));
    }
}
