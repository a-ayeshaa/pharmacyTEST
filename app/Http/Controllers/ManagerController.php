<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager;
use App\Models\customer;
use App\Models\vendor;
use App\Models\courier;
use App\Models\users;

class ManagerController extends Controller
{

    //Homepage Methods

    public function managerHome() //vuew manager homepage
    {
        $id=session()->get('logged.manager');
        $val=manager::where('u_id',$id)->first();
        session()->put('name',$val->manager_name);
        return view('ManagerView.Homepage');
    }

    public function HomeAction(Request $req) // selecting buttono actions
    {
        if($req->action=='View Users')
        {
            return redirect()->route("manager.tableSelect");
        }
    } 

    //TableSelect methods

    public function tableSelect() //view table selecting form
    {
        return view("ManagerView.TableSelect");
    }

    public function viewTable(Request $req) // table selecting for users
    {
        if($req->user=='Manager')
        {
            return redirect()->route("manager.tableManager");
        }
        else if($req->user=='Vendor')
        {
            return redirect()->route("manager.tableVendor");
        }
        else if($req->user=='Courier')
        {
            return redirect()->route("manager.tableCourier");
        }
        else if($req->user=='Customer')
        {
            return redirect()->route("manager.tableCustomer");
        }
    }

    //ViewTable methods

    public function viewCustomer() //view customer table
    {
        $val=users::where('u_type',"CUSTOMER")->get();
        return view("ManagerView.ViewTable")->with('Val',$val);
    }

    public function viewCourier() //view courier table
    {
        $val=users::where('u_type',"COURIER")->get();
        return view("ManagerView.ViewTable")->with('Val',$val);
    }

    public function viewVendor() //view vendor table
    {
        $val=users::where('u_type',"VENDOR")->get();
        return view("ManagerView.ViewTable")->with('Val',$val);
    }

    public function viewManager() //view manager table
    {
        $val=users::where('u_type',"MANAGER")->get();
        return view("ManagerView.ViewTable")->with('Val',$val);
    }

    //ViewDetails methods

    public function userInfo($id)
    {
        $val=users::where("u_id",$id)->first();
        // return $val->customer;
        return view('ManagerView.ViewDetails')->with('val',$val);
    }

    //Delete users methods

    public function userDelete($id)
    {
        $val=users::where("u_id",$id)->first();
        if($val->u_type=="CUSTOMER")
        {
            customer::where("u_id",$id)->delete();
        }
        if($val->u_type=="COURIER")
        {
            courier::where("u_id",$id)->delete();
        }
        if($val->u_type=="VENDOR")
        {
            vendor::where("u_id",$id)->delete();
        }
        if($val->u_type=="MANAGER")
        {
            manager::where("u_id",$id)->delete();
        }
        users::where("u_id",$id)->delete();
        return back();
    }

}
