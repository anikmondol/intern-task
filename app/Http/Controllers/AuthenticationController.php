<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);

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
            // Save customer info in session
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->name);

            return redirect()->route('dashboard')->with('success', 'Signed in successfully!');
        } else {
            return redirect()->route('customer.login')->with('error', 'Invalid email or password.');
        }
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect()->route('customer.login')->with('success', 'Logged out successfully!');
    }
}
