<?php

namespace App\Http\Controllers\Auth\Extended;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {
        $username = $request->get('email');
        $password = $request->get('password');

        if(filter_var($username, FILTER_VALIDATE_EMAIL))
            return Auth::attempt(['email' => $username, 'password' => $password]);
        else
            return Auth::attempt(['username' => $username, 'password' => $password]);
    }
}