<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\customer;

class CustomerController extends Controller
{
    //

        //Customer
        public function customerHome()
        {
            $u_id=session()->get('logged.customer');
            $customer=customer::where('u_id',$u_id)->first();
            return view('CustomerView.home')->with('name',$customer->customer_name);
        }
}
