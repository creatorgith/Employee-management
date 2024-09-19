<?php

namespace App\Observers;

use App\Models\Studentprofile;

class StudentprofileObserver
{
    /**
     * Handle the Studentprofile "created" event.
     */
    public function created(Studentprofile $studentprofile): void
    {
    //  dd($studentprofile);
    //  dd(request());

    // $mobile_no=request();   
    // $data=request();
    //  dd($mobile_no);
    //  $studentprofile =Studentprofile::where('id',$studentprofile->id)->update(['mobile_no'=>$mobile_no]);
    }

    /**
     * Handle the Studentprofile "updated" event.
     */
    public function updated(Studentprofile $studentprofile): void
    {
        //
    }

    /**
     * Handle the Studentprofile "deleted" event.
     */
    public function deleted(Studentprofile $studentprofile): void
    {
        //
    }

    /**
     * Handle the Studentprofile "restored" event.
     */
    public function restored(Studentprofile $studentprofile): void
    {
        //
    }

    /**
     * Handle the Studentprofile "force deleted" event.
     */
    public function forceDeleted(Studentprofile $studentprofile): void
    {
        //
    }
}
