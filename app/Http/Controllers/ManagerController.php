<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager;
use App\Models\customer;
use App\Models\vendor;
use App\Models\courier;

class ManagerController extends Controller
{
    public function managerHome() //vuew manager homepage
    {
        return view('ManagerView.Homepage');
    }

    public function HomeAction(Request $req) // selecting buttono actions
    {
        if($req->action=='View Users')
        {
            return view("ManagerView.TableSelect");
        }
    } 

    public function tableSelect() //view table selecting form
    {
        return view("ManagerView.TableSelect");
    }

    public function viewTable(Request $req) // table selecting for users
    {
        if($req->user=='Manager')
        {
            $val=manager::all();
            return view("ManagerView.ViewTable")->with('val',$val);
        }
        else if($req->user=='Vendor')
        {
            $val=vendor::all();
            return view("ManagerView.ViewTable")->with('val',$val);
        }
        else if($req->user=='Courier')
        {
            $val=courier::all();
            return view("ManagerView.ViewTable")->with('val',$val);
        }
        else if($req->user=='Customer')
        {
            $val=customer::all();
            return view("ManagerView.ViewTable")->with('val',$val);
        }
    }
}
