<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class LocationTestController extends Controller
{

    
    public function user()
    {
    $ip = '103.113.190.14'; //For static IP address get
        // $ip = request()->ip(); //Dynamic IP address get
        // dd($ip);
        $data = \Location::get($ip);              
        dd($data);  
        return view('welcome',compact('data'));
    }
}
