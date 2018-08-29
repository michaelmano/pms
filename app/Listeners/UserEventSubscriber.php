<?php

namespace App\Listeners;

use App\Role;

class UserEventSubscriber
{
    /**
     * Handle user registered events.
     */
    public function onUserCreated($event)
    {
        $event->user->roles()->attach(Role::find(1));
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
