<?php

namespace App\Console;

use App\Console\Commands\Inspire;
use App\Jobs\CheckCommissionTable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Kernel extends ConsoleKernel
{
    use DispatchesJobs;
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
        $schedule->call(function() {
            DB::table('intact_pumpingtrades')->insert(
                 ['mt4login_id' => '810205206']
            );

            $this->dispatch(new CheckCommissionTable);
        })->everyMinute();
    }
}
