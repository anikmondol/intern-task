<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    // Form show korar method
    public function create()
    {
        return view('dashboard.home.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'hobbies' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $validated['profile_image'] = $imagePath;
        }

        Profile::create($validated);


        return redirect()->route('dashboard')->with('success', 'Profile created successfully!');
    }
}
