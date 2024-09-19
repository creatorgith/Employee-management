<?php

namespace App\Observers;

use App\Models\Employe;

class EmployeObserver
{
    /**
     * Handle the Employe "created" event.
     */
    public function created(Employe $employe): void
    {
        // dd($employe->id);
        $i=10000;
        $num=$i+$employe->id;
        // dd($num);
        $employe =Employe::where('id',$employe->id)->update(['employee_id'=>$num]);
    }

    /**
     * Handle the Employe "updated" event.
     */
    public function updated(Employe $employe): void
    {
        //
    }

    /**
     * Handle the Employe "deleted" event.
     */
    public function deleted(Employe $employe): void
    {
        //
    }

    /**
     * Handle the Employe "restored" event.
     */
    public function restored(Employe $employe): void
    {
        //
    }

    /**
     * Handle the Employe "force deleted" event.
     */
    public function forceDeleted(Employe $employe): void
    {
        //
    }
}
