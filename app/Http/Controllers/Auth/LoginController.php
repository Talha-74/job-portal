<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Handle post-login redirection based on user roles.
     *
     * @param  \Illuminate\Http\Request  $requestp
     * @param  \App\Models\User  $user
     * @return mixed
     */
    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
            return redirect()->route('admin'); // Redirect to admin dashboard
        }

        return redirect(RouteServiceProvider::HOME); // Default redirect to home
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
