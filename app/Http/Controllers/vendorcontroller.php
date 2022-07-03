<?php

namespace App\Http\Controllers;
use App\Models\users;
use App\Models\vendor;
use App\Models\supply; 

use Illuminate\Http\Request;

class vendorcontroller extends Controller
{
    public function home(){
        $u_id=session()->get('logged.vendor');
        $vendor=vendor::where('u_id',$u_id)->first();
        session()->put('logged.vendor_id',$vendor->vendor_id);
        return view ('vendor.home');
    }



    public function profile(Request $request){
        $u_id=session()->get('logged.vendor');
        $vendor=vendor::where('u_id',$u_id)->first();
        
        return view('vendor.profile')->with('vendor',$vendor);
        
    }


    
    public function editprofile(){
        $u_id=session()->get('logged.vendor');
        $vendor=vendor::where('u_id',$u_id)->first();
        return view('vendor.editprofile')->with('vendor',$vendor);
    }



    public function editedprofile(Request $req){
        $u_id=$req->u_id;
        $this->validate($req,
        [
            // "name"=> "required|regex:/^[A-Za-z- .,]+$/i",
            // "password"=>"required|min:8|regex:/^.*(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$ %^&*~><.,:;]).*$/i",
            // "confirmPassword"=>"required|same:password",
            // "email"=>"required"
        ]);

        $modified = users::where('u_id',$u_id) 
                            ->update(
                                ['u_name'=>$req->name,
                                'u_email'=>$req->email,
                                'u_pass'=>$req->password]
                            );
        //return $modified;
        
        $vendor=vendor::where('u_id',$u_id)
                            ->update(
                                ['vendor_name' =>$req->name,
                                'vendor_email' =>$req->email]
                            );
        session()->flash("updated","Sucessfully Updated");
        $u_id=session()->get('logged.vendor');
        return redirect()->route('vendor.profile');
    }


    public function contracts(){
        $contrat=contract::all();
        return view ('vendor.contracts')->with('contract',$contract);
    }


    public function market(){
        $supp=supply::all();
        return view ('vendor.market')->with('supp',$supp);
    }


    public function supply(){
        $v_id=session()->get('logged.vendor_id');
        $supp=supply::where('vendor_id',$v_id)->get();
        return view('vendor.supply')->with('supp',$supp);
    }


    public function addsupply(){
        return view('vendor.addsupply');
    }

    public function addedsupply(Request $req){
        session()->flash("added","Sucessfully Added");
        $v_id=session()->get('logged.vendor_id');
        $supply= new supply();
        $supply->med_id = $req->med_id;
        $supply->med_name =$req->med_name;
        $supply->price_perUnit =$req->price_perUnit;
        $supply->stock = $req->stock;
        $supply->expiryDate = $req->expiryDate;
        $supply->manufacturingDate = $req->manufacturingDate;
        $supply->vendor_id=$v_id;
        $supply->save();
        return redirect()->route('vendor.supply');
        
    }
}
