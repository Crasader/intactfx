<?php

namespace App\Console;

use App\Console\Commands\Inspire;
use App\Jobs\CheckCommissionTable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        Log::info('Showing user profile for user');
        $schedule->call(function() {
            echo 'adsf';
            $this->dispatch(new CheckCommissionTable);
        })->everyMinute();
    }
}
