<?php

namespace App\Listeners;

use App\Events\CreateNewUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Auth;
use App\Role;

class AttachUserRoleListener
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
        $userRole = Role::where('name', 'user')->firstOrFail();
        
        $event->user->roles()->attach($userRole->id);
    }
}
