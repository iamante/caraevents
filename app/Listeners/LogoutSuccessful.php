<?php

namespace App\Listeners;

use IlluminateAuthEventsLogout;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogoutSuccessful
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
     * @param  IlluminateAuthEventsLogout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->subject = 'Logout';
        $event->description = 'Logging out';
        $event->user_name = Auth::user()->name;
        $event->user_email = Auth::user()->email;

        Session::flash('logout-success', 'Hello'. $event->user->name . ', welcome back!');
        activity($event->subject)
                ->by($event->user)
                ->withProperties([
                    'name' => $event->user_name,
                    'email' => $event->user_email,
                ])
                ->log($event->description);
    }
}
