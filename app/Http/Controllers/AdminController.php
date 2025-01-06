<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Manage Admins view (main page)
    public function manageAdmins()
    {
        // Fetch all admins from the database
        $admins = Admin::all();

        // Return the view and pass the admins list
        return view('admin.manageAdmins', compact('admins'));
    }

    // Show the form for adding a new admin
    public function addAdmin()
    {
        return view('admin.addAdmin'); // View to show the form for adding an admin
    }

    // Store the new admin in the database
    public function storeAdmin(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Confirm password field
        ]);

        // Create a new admin record
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password before storing
        ]);

        // Redirect after successful registration
        return redirect()->route('admin.manageAdmins')->with('status', 'Admin added successfully!');
    }

    // Show the form for removing an admin
    public function removeAdmin()
    {
        // Fetch all admins for removal
        $admins = Admin::all();

        // Return the view and pass the admins list
        return view('admin.removeAdmin', compact('admins'));
    }

    // Handle admin removal
    public function removeAdminSubmit($adminId)
    {
        // Find the admin by their ID and delete them
        $admin = Admin::findOrFail($adminId);
        $admin->delete();

        // Redirect with a success message
        return redirect()->route('admin.manageAdmins')->with('status', 'Admin removed successfully!');
    }
}
