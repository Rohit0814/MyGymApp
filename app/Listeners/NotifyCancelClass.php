<?php

namespace App\Listeners;

use App\Events\classCanceled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail;

class NotifyCancelClass
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(classCanceled $event): void
    {
        // $scheduledClass=$event->scheduledClass;
        $members=$event->scheduledClass->members();
        $members->each(function($user){
            //send a mail...
            Mail::to($user)->send(new ClassCanceledMail);
            
        });
    }
}
