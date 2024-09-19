<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Salary;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $man=Auth::user()->id;
        $usertype=Auth()->user()->usertype;
        // dd($usertype);
      
        
        if($usertype=='admin')
        {
              $employes=Employe::all();
            //   return view('/indexemployee',compact('employes'));
              return view('/home',compact('employes'));
            // return view('/indexemployee',compact('employes'));
        }
        else{
            $employes=Employe::where('user_id',$man)->first();
            return view('/home',compact('employes'));
        }
// dd($man);
// // $man=3;
        
        // dd($employes);       
        // $hi=$employes->id;
        // dd($hi);
        // if(!empty($salarys))         
        // return view('salaryrecord',compact('salarys'));
    // else 
    // return view('/home',compact('employes'));x
    }


    public function salary(){
        $man=Auth::user()->id;
// dd($man);
        $salarys=Employe::where('user_id',$man)->first();
        // dd($employes);
        if($salarys == null){
        return view('/employe');
            
        }
        return view('/home',compact('salarys'));
    }




}
