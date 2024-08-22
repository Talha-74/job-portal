<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function profile() {
        $profile = Auth::user();

        return view('profile', compact('profile'));

    }

    function userApplications() {
        $applications = Application::where('user_id', auth()->user()->id)->get();

        return view('userApplication', compact('applications'));
    }
}
