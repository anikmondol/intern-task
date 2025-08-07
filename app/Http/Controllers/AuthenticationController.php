<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{


    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('dashboard')->with('success', 'Customer registered successfully!');
    }


    public function login()
    {
        return view('auth.login');
    }


    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        $customer = Customer::where('email', $request->email)->first();


        if ($customer && Hash::check($request->password, $customer->password)) {

            return redirect()->route('dashboard')->with('error', 'Signed in successfully!');
        } else {

            return redirect()->route('customer.login')->with('error', 'Invalid email or password.');
        }
    }
}
