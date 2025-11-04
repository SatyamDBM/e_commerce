<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Registration page view
    public function showRegister()
    {
        return view('auth.register');
    }

    // Store user data in DB
    public function registerStore(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        // ✅ Save user (without hashing)
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; 
        $user->usertype = 'user'; // default
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->save();

        // ✅ Redirect with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
