<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Skills;
use App\Models\Employe;
use App\Models\Employeskills;
use App\Http\Requests\SkillRequest;
use App\Http\Requests\SkillEditRequest;
use Exception;


class SkillController extends Controller
{
    public function create($id){
        $employe = Employe::getId($id)->first();
        // dd($employe);
        // dd($id);
        $skills=Skills::get();
        
        // dd($skills);
        return view('skill',compact('skills','employe'));

    }
    public function store(SkillRequest $request,$id){
        // dd($request->skills);
        // dd($request);
        // $validatedData = $request->validated();
        // dd($validatedData);
        // dd($validatedData);

        // $employe=Employeskills::where('employe_id',$id)->get();

       try{ 
        if (Employeskills::getEmployeId($id)->exists()){
        // dd('hi');
        return redirect('/indexskill')->with('message', 'this employe has already skills');
    }
    else{
        // dd('bye'); 
        // dd($employe);
        $stringskill=implode(",",$request->skills);
// dd($stringskill);
        $data=['employe_id'=>$id,'employeskills'=>$stringskill];
        // dd($data);
        $skills=Employeskills::create($data);
        return redirect('/indexemployee')->with('message',"Employe skills has been added");
    }
}
catch(Exception $e){
    Log::error($e->getMessage());
}
    }

    public function index(Request $request){
        Session::forget('search');
        try{
        $skills=Employeskills::orderby('id','asc');
        if($request->search){
            // dd($request->search);
            $employe=$skills->where('employeskills','like', '%' . request('search') . '%');
            Session::put('search', $request->search);
            // dd($employe);
        }
        $skills=$skills->get();
        return view('indexskill',compact('skills'));
    }
catch(Exception $e){
    Log::error($e->getMessage());

}
}

    public function delete($id)
    {
     try{
       if( $skills=Employeskills::getId($id)->delete());
        // $employe->delete();
        return redirect('/indexskill')->with('message', 'employe skills has been deleted');
    }
        catch(Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function edit($id)
    {
        try{
        $skills=Skills::all();
        $employe = Employeskills::findOrFail($id);
        // dd($skills);
        // dd($employe);//
        $employeskills =$employe->employeskills; 
    $man=explode(",",$employeskills);
    // dd($man);
        // Pass $selectedSkills along with other data to the view
        return view('editskill', compact('skills','employe', 'man'));
       }
       catch(Exception $e){
        Log::error($e->getMessage());
        }
    }
       public function update(SkillEditRequest $request, $id)
       {
        try{
        // dd($request);
        $stringskill=implode(",",$request->skills);
        // dd($stringskill);
        $employe=Employeskills::getId($id)->update(['employeskills'=>$stringskill]);
        return redirect('/indexemployee')->with('message', 'employe skills has been updated');
    }
    catch(Exception $e){
        Log::error($e->getMessage());
    }
    }
        public function show($id){
            try{
            $employeskill=Employeskills::findorFail($id);
            return view('showskill',compact('employeskill'));
        }
        catch(Exception $e){
            Log::error($e->getMessage());
        }
    }
}