<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Posts;
use App\Models\Lives;
use App\Models\Countries;
Use App\Models\States;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Usernotnull\Toast\Concerns\WireToast;

class Employe extends Component
{
    use WithFileUploads;
    use WireToast;

//     public $title,$name;
public $country_id;
public $selectedState;

public $countries;
public $states;
public $firstname; // Corrected property name
public $lastname;
public $email;
public $password;
public $address;
public $date;
public $gender;
public $photo;
public $lives;

    public function store(){
        // dd($this);
       $validatedata= $this->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:6',
        'address' => 'required|string',
        'date'=> 'required',
        'gender' => 'required|in:male,female,other',
        'photo' => 'required|max:5000|mimes:jpg,png',
        'country_id'=>'required',
        'selectedState'=>'required',
       ]);
       $dates= Carbon::parse($validatedata['date'])->format('Y-m-d');
       $imageName = time().'.'.$validatedata['photo']->getClientOriginalname();
    //    dd($imageName);
    //    $validatedata['photo']->move(public_path('employephoto'), $imageName);
    //    dd($imageName);
    //    dd($dates);

    $data=[
        'firstname' => $validatedata['firstname'],
        'lastname' => $validatedata['lastname'],
        'email' => $validatedata['email'],
        'password'=>$validatedata['password'],
        'address'=>$validatedata['address'],
        'gender'=>$validatedata['gender'],
        'profilephoto'=>$imageName,
        'joiningdate'=>$dates,
        'country_id'=>$validatedata['country_id'],
        'state_id'=>$validatedata['selectedState'],

    ];
    // dd($data);
    if (!empty($this->getErrorBag()->messages())) {
        // dd('hi');
        Lives::create($data);
        toast()
        ->success('Sucessfully Registered')
        ->pushOnNextPage();
        return redirect('/mylive')->with('message',"New Register has been stored");
    }
    else{
    toast()
    ->warning('Watch out!')
        ->push();
        // return redirect('/mylive')->with('message',"New Register has been stored");
    }

    }


public function mount()
{
    // Sample data for countries and states (replace with your actual data)
    $this->countries=Countries::all();
    $states=States::all();
    // dd($states);
}

public function selectedCountry()
{
    // dd($this->country_id);
    // Reset state dropdown when country 
    // dd($value);
    $this->states = States::where('country_id',$this->country_id)->get();

    
    // dd($this);
}

public function render()
{
    $lives=Lives::get();
    // dd($lives);
    return view('livewire.employe',['lives'=>$lives]);
}
}
