<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccessful
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
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    // public function handle(IlluminateAuthEventsLogin $event)
    public function handle(Login $event)
    {
        

        $event->subject = 'Login';
        $event->description = 'Logging in as user';
        $event->user_name = Auth::user()->name;
        $event->user_email = Auth::user()->email;

        Session::flash('login-success', 'Hello'. $event->user->name . ', welcome back!');
        activity($event->subject)
                ->by($event->user)
                ->withProperties([
                    'name' => $event->user_name,
                    'email' => $event->user_email,
                ])
                ->log($event->description);
    }
}
