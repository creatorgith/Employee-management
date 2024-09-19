<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\http\Requests\EditEmployeeRequest;
use App\http\Requests\AddSalaryRequest;
use App\Notifications\EmployeeNotification;
use App\Models\Employe;
use App\Models\User;
use App\Models\Salary;
use Mail;
use App\Mail\hellomail;
use App\Events\Registermail;
use Carbon\Carbon;
use Session;
// use Notification;
use App\Exports\EmployeExport;
use App\Imports\EmployeImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Log;
use Illuminate\Notifications\Notifiable;
use App\Models\Notification;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Http\Resources\Api\ExpenseCategory as ExpenseCategoryResource;
use App\http\Requests\API\ExpenseRequest;
use App\http\Requests\API\LoginRequest;
use Auth;
use App\Services\ExpenseService;


class EmployeController extends Controller
{

    public function create(){
        return view('employe');
    }

    public function store(StoreEmployeeRequest $request){
        // dd($request->photo);
// dd($request);
        try{
        $imageName = time().'.'.$request->photo->getClientOriginalname();
        $request->photo->move(public_path('employephoto'), $imageName);
        // dd($imageName);
        $date=Carbon::createFromFormat('d-m-Y',$request->date)->format('Y-m-d');
        // dd($date);
        // $name=ucfirst($request->gender);
        // dd($name);
        $data1=['email'=>$request->email,'password'=>$request->password];
        // dd($data1);
$user=User::create($data1);
        // dd($user->id);
        $data=['user_id'=>$user->id,'firstname'=>$request->firstname,'lastname'=>$request->lastname,'email'=>$request->email,'password'=>$request->password,'address'=>$request->address,'joiningdate'=>$date,'gender'=>$request->gender,'profilephoto'=>$imageName];
  
       if( $employe=Employe::create($data))
        // dd('hi');
        {
            $post=[
                    'title'=>'',
            ];
            $userSchema = User::where('id',$user->id)->first();
            // dd($userSchema);
    $hel=    $userSchema->notify(new EmployeeNotification($post));
    // dd($hel);
        // Notification::send($userSchema, new EmployeeNotification($post));
        // dd('hi');.
        // dd($employee);
    
        
        // dd($employe);
        $mailData = [
            'title' => 'Employee data has uploaded ',
            'body' => $employe->joiningdate,
        ];
        // dd($recipent);
        event(new Registermail($mailData));
        return redirect('/indexemployee')->with('message',"New Register has been stored");
    }
    else{
        return redirect('/indexemployee')->with('message',"New Register not been created");
    }}
    catch(Exception $e){
        
        Log::info($e->getMessage());
        dd($e);
    }
    }
    public function index(Request $request){
$name="";


        // Session::forget('search');
        // Session::forget('fromdate');
        // Session::forget('todate');
        try{
        $employes=Employe::orderby('id','desc');

        // dd($employes);
        // dd($request->todate);
        // dd($employes);
        if ($request->search) {
            // dd($request->search);
    $employes = $employes->where('firstname', 'like', '%' . request('search') . '%')->orwhere('lastname', 'like', '%' . request('search') . '%');
    // Session::put('search', $request->search);
    $name=$request->search;  
} 

if($request->fromdate && $request->todate){
        $fromsdate=Carbon::createFromFormat('d-m-Y',$request->fromdate)->format('Y-m-d');
        $tosdate=Carbon::createFromFormat('d-m-Y',$request->todate)->format('Y-m-d');
        // dd($todate);
        $employes = Employe::whereBetween('joiningdate', [$fromsdate, $tosdate]);
        // dd($employes);

$fromdate=$request->fromdate;
$todate=$request->todate;


        // $employes = $employes->paginate(10);
        // return view('indexemployee', compact('employes',$request->fromdate,$request->todate));
        $employes = $employes->get();
        // dd($employes);
        return view('indexemployee', ['employes'=>$employes,'fromdate'=>$fromdate,'todate'=>$todate]);
        
}
else{
     $employes = $employes->get();
        return view('indexemployee', ['employes'=>$employes,'name'=>$name]);

}
    }
    catch(Exception $e){
        // dd($e);
        Log::error($e->getMessage());


    }
}

    public function delete($id)
    {
        // dd('bye');
        try{
       if( $employe=Employe::where('id',$id)->delete());
        return redirect('/indexemployee')->with('message', 'Employe data has been deleted');
    }
    catch(Exception $e){
        Log::error($e->getMessage());
    
    }
}

    public function edit($id)
    {
    //  dd('bye'); 
    try{
        $employe = Employe::where('id',$id)->first();
        // dd($employe);
        if($employe!=null){
            // dd('hi');
        return view('editemploye', compact('employe'));        
        }
        else{
            // dd('bye');
            abort( 401) ;
        } 
    }
    catch(Exception $e){
        Log::error($e->getMessage());
        // abort( response('Unauthorized', 401) );
    }

}

    public function update(EditEmployeeRequest $request, $id)
    {
        // dd($request);
        try{
        $man=Employe::where('id',$id)->first();
        // dd($man);
        if(empty($request->photo)){
            $imageName=$man->profilephoto;
            // dd($imageName);
          }
          else{
          // if(!empty($student->))
          $imageName = time().'.'.$request->photo->getClientOriginalname();
          $request->photo->move(public_path('employephoto'), $imageName);
          
        }

        $date=Carbon::createFromFormat('d-m-Y',$request->date)->format('Y-m-d');


        $employe =Employe::where('id',$id)->update(['firstname'=>$request->firstname,'lastname'=>$request->lastname,'address'=>$request->address,'joiningdate'=>$date,'gender'=>$request->gender,'profilephoto'=>$imageName]);
        // dd($employe);
        return redirect('/indexemployee')->with('message', 'Employe data has been updated');
    }
    catch(Exception $e){
       
        Log::error($e->getMessage());

    }
    }

    public function show($id)
    {
        try{
        $employe=Employe::findorFail($id);
        return view('showpage',compact('employe'));
    }
    catch(Exception $e){
        Log::error($e->getMessage());
    
    }
}


    public function salary($id)
    {
    try{
        $employe = Employe::where('id',$id)->first();
        // dd($employe);
        if($employe!=null){
            // dd('hi');
        return view('salary', compact('employe'));        
        }
        else{
            // dd('bye');
            abort( 401) ;
        } 
    }
    catch(Exception $e){
        Log::error($e->getMessage());
        // abort( response('Unauthorized', 401) );

    }

}
public function addsalary(AddSalaryRequest $request,$id)
{
    // dd($request);

    // $Month = $request->month;
    // $date = Carbon::createFromFormat('Y-m', $Month);
    // $formattedMonth = $date->format('M-Y'); // F represents full month name
    // dd($formattedMonth);
    // $data=[
    // dd($data);
    try{
    $data=['employe_id'=>$id,'month'=>$request->month,'salary'=>$request->salary];
    // dd($data);

    $salary=Salary::create($data);
    // dd($salary);
    return redirect('/indexemployee')->with('message', 'Salary has credited');
    }
    catch(Exception $e){
        Log::error($e->getMessage());
    
    }

}

 public function salaryindex()
 { 
    try{
    $salarys=Salary::orderby('id','desc');
    $salarys = $salarys->paginate(10);
    return view('indexsalary', compact('salarys'));
 }

 catch(Exception $e){
    Log::error($e->getMessage());
}
}

 public function export()
    {
        return Excel::download(new EmployeExport, 'employees.xlsx');
        return view('indexemployee');
    }


    public function send(){
        try{
        return view ("import");
    }
    catch(Exception $e){
        Log::error($e->getMessage());
    
    }
}
    public function import(Request $request)
    {
        // dd(new EmployeImport);  
        Excel::Import(new EmployeImport,$request->file('file'));

        return redirect('indexemployee');

                // $path1 = $request->file('mcafile')->store('temp'); 
        // $path=storage_path('app').'/'.$path1;  
        // $data = \Excel::import(new Employemport,$request->file);

    }

    public function salaryrecord($id){
        // $salary=Salary::findorFail($id);
        $salarys = Salary::where('employe_id',$id)->get();
        // dd($salarys);

        // dd('hi');
        return view('salaryrecord', compact('salarys'));
    }
    public function notify(Request $request){
        $notifications=Notification::all();
// dd($notifications);
return view('indexnotification',compact('notifications'));
    }

    public function expense(Request $request)
    {

      
      $lists=ExpenseCategory::where('status',1)->orderby('id','asc');  
        if($request->search)
        {
          $search= $request->search;
           $lists=$lists->where('name', 'like', '%' . $search. '%');

        }
         if($request->page==null)
         {
            $lists=$lists->get();

         }
         else{
            $lists=$lists->paginate(5);
         }
        $lists=ExpenseCategoryResource::collection($lists);
return $lists;
    }

    public function login(LoginRequest $request)
    {
        // Validate the incoming request
      
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')]) )
    {
    $auth_user = Auth::user();

        // Generate a token for the user
        $token = $auth_user->createToken('auth_token')->plainTextToken;
        // Return a success response with the token
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
        ]);
    }
}

    public function storeexpense(ExpenseRequest $request,ExpenseService $service){
    // dd('ho');/
    // dd($request);
    $user=Auth::user();
// dd($user->locationid);
$data=[];   
$date=date('Y-m-d');    
$locationid="1";
    $expense=$service->createExpense($locationid,$request,$user->id,$date);
    $message="Expense Created";  

    return response()->json([
        'success'=>true,
        'message' =>$message,                             
       ],200);
    // dd($expense);
    }
    
    public function editexpense(ExpenseRequest $request,$id,ExpenseService $service)
    {
        $user=Auth::user();
        $data=[];   
        $date=date('Y-m-d');    
        $locationid="1";
            $expense=$service->updateExpense($locationid,$request,$user->id,$id);
            $message="Expense updated";  
        
            return response()->json([
                'success'=>true,
                'message' =>$message,                             
               ],200);
    }
}
