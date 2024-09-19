<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Employe;
use Carbon\Carbon;

class Sendmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // dd('hi');
        $employe=Employe::all();
        foreach($employe as $emp)
        {
            // dd($emp->email);
            // $man=$emp->joiningdate;
            // dd(date('m-d'));
            // dd($emp->joiningdate);
            // dd($emp->FullName);
            $mailData = [
                'title' => '"Congratulations on your  work anniversary! I am thrilled that you have joined our team"',
                'body' => $emp->FullName,
            ];
            $currentDate = date('Y-m-d');
            // $carbonDate = Carbon::parse($currentDate);
            // $newDate = $carbonDate->addYear(1);
            // dd($newDate);

            // dd($currentDate);
            $dobMonth = date('m', strtotime($emp->joiningdate));
            // dd($dobMonth);
            $dobDay = date('d', strtotime($emp->joiningdate));
            // dd($dobDay);
            $dobYear = date('Y', strtotime($emp->joiningdate));
            // dd($dobYear);y

            $currentMonth = date('m', strtotime($currentDate));
    $currentDay = date('d', strtotime($currentDate));
    $currentYear = date('Y', strtotime($currentDate));
    if ($dobMonth == $currentMonth && $dobDay == $currentDay && $dobYear != $currentYear) {
        // dd($emp->email);
        Mail::to($emp->email)->send(new \App\Mail\hellomail($mailData));
    }
    else{
        // dd($emp->joiningdate);
    }
        }
        // \Log::info("It Working");
        // Mail::to("employe@gmail.com")->send(new \App\Mail\hellomail());
    }
}   