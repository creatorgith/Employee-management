<?php

namespace App\Services;
use Log;
use Exception;
use App\Models\User;
use App\Models\Expense;
use App\Models\ExpenseAccount;
use App\Models\BranchCollection;
use Illuminate\Support\Facades\Gate;
use App\Traits\ActivityLog;
use App\Traits\Common;
use Auth;
use App\Mail\Admin\ExpenseMail;
use Mail;
use App\Notifications\ExpenseNotification;
use App\Jobs\ExpenseNotificationJob;
use App\Models\Attachments;

class ExpenseService {   
  // use ActivityLog,Common;
   
     public function createExpense($location_id,$request,$user_id,$date)
    {


        \DB::beginTransaction();
      
          try{
             $expense_account=ExpenseAccount::where([['entity_id',$location_id],['entity_name','App\Models\LocationUser']])->where('scope','location')->where('expense_category_id',$request->expense_category_id)->first();
      // dd($expense_account);
                $create=[
                  'location_id' => $location_id,
                  'expense_category_id' => $request->expense_category_id,
                  'expense_account_id' => $expense_account->id,
                  // 'expense_date' => date('Y-m-d H:i:s',strtotime($request->expense_date)),
                  'amount' => $request->amount,
                  'is_paid' => $request->is_paid,
                  'entry_by' => $user_id,
                  'memo' =>$request->memo,
                  'date' =>date('Y-m-d H:i:s',strtotime($request->expense_date)),
                ];
                if(isset($request->expense_date)){
                  $create['expense_date']=$request->expense_date;
                }
                if(isset($request->is_taxable)){
                  $create['is_taxable']=$request->is_taxable;
                }
                if(isset($request->is_billable)){
                  $create['is_billable']=$request->is_billable;
                }
                if(isset($request->payment_date)){
                  $create['payment_date']=date('Y-m-d H:i:s',strtotime($request->payment_date));
                }
                if(isset($request->paid_through)){
                  if($request->paid_through==1)
                  $create['paid_through']='pattycash';
                }
                // if($request->paid_through==0)
                // {

                //  if(isset($request->payment_mode)){
                //     $create['payment_mode']=$request->payment_mode;
                // }
                // }
                if(isset($request->payment_mode))
                {
                    $create['payment_mode']=$request->payment_mode;
                }
                if(isset($request->via)){
                  $create['via']=$request->via;
                }
                // dd($create);
               $expense=Expense::create($create);
               // if($expense->expensecategory->is_return==1)
               // {

               //    $this->createBranchCollection($expense);

               // }
// dd($expense);
                    \DB::commit();
                    $file = $request->image;
                    $extension = $file->extension();
                    $create=[
                      'entity_id' =>$expense->id,
                      'file_name'=>$file,
                      'file_type'=>null,
                      'file_path'=>"pdf",
                  ];
                  $attachment=Attachments::create($create);
                     
                    // $ip = $this->getRequestIP();
                    // $this->doActivityLog(
                    // $expense,
                    // Auth::user(),
                    // ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
                    // 'add_expense',
                    // 'Expense Created successfully'
                    //   );
                      // dd($expense);
                    

               return $expense;

          }
      catch(Exception $e)
      {
               Log::info($e->getMessage());   
               \DB::rollBack();        
      }
    }
      
    public function updateExpense($location_id,$request,$user_id,$id)
    {


          \DB::beginTransaction();
      try{
        // dd($id);
              $expense=Expense::where('id',$id)->first();
// dd($expense);
              // if($expense == null)
              // {
              //   // dd('hi');
              //   return response()->json([
              //     'success'=>false,
              //     'message' =>"This id has No more",
              //    ],500); 
              // }
              // dd($expense);
              $date=$expense->date;
               if($date=='')
              {
                  $date=$expense->created_at;
              }
              // $branch_collection=BranchCollection::where('entity_id',$expense->id)->where('entity_name','App\Models\Expense')->first();
              // if($branch_collection!=null)
              // {
              //    $branch_collection->delete();
              // }
              $expense->delete();
              $expense=$this->createExpense($location_id,$request,$user_id,$date);
              // dd($expense);
              //incase ref means, entity id will do
           \DB::commit();
            // $ip = $this->getRequestIP();
            // $this->doActivityLog(
            // $expense,
            // Auth::user(),
            // ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
            // 'update_expense',
            // 'Expense Updated successfully'
            // );
           return $expense;
            }
      catch(Exception $e)
      {
        Log::info($e->getMessage());   
               \DB::rollBack();     
      }
    }

    public function sendexpensemail($expense){
      // dd($expense);
      if($expense != null){
        $mail=\Config::get('settings.contact_email');
        // dd($mail);
        Mail::to($mail)->send(new ExpenseMail($expense));
      }
    }
 
  
 }