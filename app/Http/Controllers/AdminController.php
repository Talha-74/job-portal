<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('Admin.dashboard');
    }

    function show()
    {
        $admins = User::role('admin')->get();
        // dd($admins)->toArray();
        return view('Admin.show', compact('admins'));
    }

    function create()
    {
        return view('Admin.create');
    }

    function store(Request $request)
    {
        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        $admin->save();

        $admin->assignRole('admin');

        return redirect()->route('show.admin')->with('success', 'Admin Created Successfully');
    }
}
