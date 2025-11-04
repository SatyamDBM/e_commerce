<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function showLoginForm()
{
    if (Auth::check()) {
        if (Auth::user()->usertype === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return view('auth.login');
}


    // ✅ Login logic
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            Auth::login($user);

            if ($user->usertype === 'admin') {

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    // ✅ Logout logic
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
