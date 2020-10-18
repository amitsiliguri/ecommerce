<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() : object
    {
        return view('frontend.pages.customer.auth.login');
    }

    public function login(Request $request) : object
    {
        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }else {
            return back()->withErrors(['message' => 'Incorrect email or password']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        if (!Auth::guard('web')->check()) {
            $request->session()->invalidate();
        }
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
