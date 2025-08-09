<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $customerId = Session::get('customer_id');


         $customer = Customer::where('id', $customerId)->first();


        $profile = Profile::where('customer_id', $customerId)->first();



        return view('dashboard.home.index', compact('customer', 'profile'));
    }
}
