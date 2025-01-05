<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminAuthenticatedSessionController extends Controller
{
    // Display the login form
    public function create()
    {
        return view('auth.admin-login');  // Make sure to create 'resources/views/auth/admin-login.blade.php'
    }

    // Handle admin login logic
    public function store(Request $request)
    {
        // Validate login data
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to log in the admin using the admin guard
        if (Auth::guard('admin')->attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        )) {
            // Redirect admin to their dashboard
            return redirect()->route('admin.dashboard');  // Make sure to define the 'admin.dashboard' route
        }

        // If login attempt fails, throw validation exception
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // Log out the admin and redirect to login page
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();  // Log out the admin using the admin guard
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate CSRF token

        return redirect('/admin/login');  // Redirect to the admin login page
    }
}
