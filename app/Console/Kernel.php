<?php

namespace App\Console;

use App\User;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\DeleteUserNotVerified;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        DeleteUserNotVerified::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('user:verified')->everyMinute();
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function() {
        //     User::whereNull('email_verified_at')->where('created_at','<', now()->subDays(2))->delete();
        // })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
