<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Models\Application;
use App\Models\JobSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function profile()
    {
        $profile = Auth::user();

        return view('profile', compact('profile'));
    }

    function userApplications()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();

        return view('userApplication', compact('applications'));
    }

    function savedJobs()
    {
        $savedJobs = JobSaved::where('user_id', auth()->user()->id)->get();

        return view('savedJobs', compact('savedJobs'));
    }

    function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    function update(UpdateProfile $request)
    {
        $user = auth()->user();

        $cv = $user->cv; 
        $image = $user->image;

        if ($request->hasFile('cv')){
            $cvpath = $request->file('cv')->store('public/user-cvs');
        $cv = url(Storage::url($cvpath));
        }

        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/user-images');
        $image = url(Storage::url($imagePath));
        }

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'title'    => $request->title,
            'bio'      => $request->bio,
            'twitter'  => $request->twitter,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'cv'       => $cv,
            'image'    => $image,
        ]);

        return redirect()->back()->with('success', 'Your profile updated successfully');
    }
}
