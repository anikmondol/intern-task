<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // Form show korar method
    public function create()
    {


        $customerId = Session::get('customer_id');


        $customer = Customer::where('id', $customerId)->first();

        $profile = Profile::where('id', $customerId)->first();



        return view('dashboard.home.create', compact('customer', 'profile'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email,' . Session::get('customer_id') . ',customer_id',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'hobbies' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);

        // customer_id session থেকে নিলাম
        $customerId = Session::get('customer_id');

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $validated['customer_id'] = $customerId;

        // profile create or update
        Profile::updateOrCreate(
            ['customer_id' => $customerId], // কোন condition-এ match হবে
            $validated // update/create করার data
        );

        return redirect()->route('dashboard')->with('success', 'Profile saved successfully!');
    }
}
