<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageAdmins()
    {
        return view('admin.manageAdmins');
    }

    public function addAdmin()
    {
        // Logic for adding admin
        return view('admin.addAdmin'); // You will create this view for form to add an admin
    }

    public function removeAdmin()
    {
        // Logic for removing admin
        return view('admin.removeAdmin'); // You will create this view to handle admin removal
    }
}
