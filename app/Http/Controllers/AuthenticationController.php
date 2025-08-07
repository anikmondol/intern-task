<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{


    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // 🔸 Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // 🔸 Store data into database
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Customer registered successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }


    public function signin(Request $request)
    {



        dd($request->all());
    }
}
