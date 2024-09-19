<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Studentprofile;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditStudentRequest;
use App\Models\Countries;
use App\Models\States;
use Mail;
use App\Mail\hellomail;
use App\Events\Registermail;

class StudentController extends Controller
{
    public function create()
    {
      // $countries=Countries::get();
      $countries = Countries::active()->get();
      // dd($countries);
      $states=States::get();

      $item=collect([
        ['name'=>'apple','price'=>'500'],
        ['name'=>'bringal','price'=>'300']
    ]);
    $result=$item->sortby('price');
      // dd($result);
      return view('blog',compact('countries','states'));

    }
    

    public function store(StoreUserRequest $request)
    {
       
          // Validation passed, create and store the user
        //   $student = new Student();
        //   $student->name = $request->name;
        //   $student->username = $request->username;
        //   $student->email = $request->email;
        //   $student->password = bcrypt($request->password);
        //   $student->gender =$request->gender;
          // $student->file =$request->file;
        //   $student->save();
        // dd($request); 
        $imageName = time().'.'.$request->file->getClientOriginalname();
  $request->file->move(public_path('uploadedimages'), $imageName);

          $data=['name'=>$request->name,'username'=>$request->username,'email'=>$request->email,'password'=>$request->password,];
          
        //   dd($data);
        //  dd($request->states);

        $student=Student::create($data);
        // dd($student->id);
        $datas=['student_id'=>$student->id,'mobile_no'=>$request->phno,'gender'=>$request->gender,'file'=>$imageName,'country_id'=>$request->country,'state_id'=>$request->states];
        $studentprofile=Studentprofile::create($datas);
        // dd($studentprofile);3
          
          $mailData = [
            'title' => 'Register Sucessfully ',
            'body' => $student->name,
        ];

        $recipent=$student->email;
        // dd($recipent);
        event(new Registermail($mailData,$recipent));

        // Mail::to($recipent)->send(new hellomail($mailData));
           
        // dd("Email is sent successfully.");
        //   dd($student);
          // Optionally, you can redirect the user to a success page
        //   return redirect()->route('user.success');
        //   return redirect()->back()->with('message',"Details has been stored");
          return redirect('/index')->with('message',"New Register has been stored");

      }
    
 public function index(Request $request)
 {
  // dd( $request->search);
  
  $student=Student::orderby('id','asc');
  // dd($student);
//  return $country_id=Countries::with('states')->get();
  
  if ($request->search) {
    $student = $student->where('name', 'like', '%' . request('search') . '%')->orwhere('username', 'like', '%' . request('search') . '%');
    // dd($student);
} 
     $student = $student->paginate(10);
     return view('index', compact('student'));
 }

    public function edit($id)
    {
      
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    public function delete($id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return redirect('/index')->with('message', 'Student data has been deleted');
    }


    public function update(EditStudentRequest $request, $id)
    {
      $man=Student::where('id',$id)->first();
      // dd($man->file);
      if(empty($request->file)){
        $imageName=$man->file;
        // dd($imageName);
      }
      else{
      // if(!empty($student->))
      $imageName = time().'.'.$request->file->getClientOriginalname();
      $request->file->move(public_path('uploadedimages'), $imageName);
    }
      // dd($imageName);
 

        $student =Student::where('id',$id)->update(['name'=>$request->name,'username'=>$request->username,'email'=>$request->email,'gender'=>$request->gender,'file'=>$imageName,'country-id'=>$request->country,'states-id'=>$request->states]);
        // dd($student);
        // $student->name = $request->name;
        // $student->username = $request->username;
        // $student->email = $request->email;
        // $student->gender = $request->gender;   
        
        // $student->save();
        // dd($student);
        // Student::whereId($id)->update($updateData);
        return redirect('/index')->with('message', 'Student data has been updated');
    }

    public function getStates($country_id)
    {
        $states = States::where('country_id', $country_id)->get();
        
        return response()->json($states);
    }
    // public function fetchstate(Request $request)
    // {

    //   $states = State::where('country_id', $country_id)->get();
    //     return response()->json($states);
    //   // dd ($country_id);
    //   // // $data=State::where('country_id',$)
    //   // $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
    //   // return response()->json($data);
    // }
}
