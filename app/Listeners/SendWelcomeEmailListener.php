<?php

namespace App\Listeners;

use App\Events\CreateNewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\WelcomeEmail;


class SendWelcomeEmailListener implements ShouldQueue
{
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  CreateNewUserEvent  $event
     * @return void
     */
    public function handle(CreateNewUserEvent $event)
    {

        Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
    }
}
