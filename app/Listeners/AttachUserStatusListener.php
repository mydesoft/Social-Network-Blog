<?php

namespace App\Listeners;

use App\Events\CreateNewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Status;
use App\User;

class AttachUserStatusListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateNewUserEvent  $event
     * @return void
     */
    public function handle(CreateNewUserEvent $event)
    {
        $userStatus = Status::where('status', 'active')->firstOrFail();

        $event->user->statuses()->attach($userStatus->id);
    }
}
