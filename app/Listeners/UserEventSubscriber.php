<?php

namespace App\Listeners;

use App\Role;
use App\Profile;

class UserEventSubscriber
{
    /**
     * Handle user registered events.
     */
    public function onUserCreated($event)
    {
        $profile_data = [];
        $employee_role = Role::where('title', 'employee')->firstOrFail();
        $event->user->roles()->attach($employee_role);
        $event->user->profile()->save(new Profile($profile_data));
    }

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\User\Created',
            'App\Listeners\UserEventSubscriber@onUserCreated'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
