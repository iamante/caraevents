<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteUserNotVerified extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:verified';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the user not verified in a week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email_verified_at',null)->where('created_at','<', Carbon::today()->subDays(3))->delete();
        
        return $user;
    }
}
