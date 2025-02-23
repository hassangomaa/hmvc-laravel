<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Run queue worker every minute without overlapping
        // $schedule->command('queue:listen')->everyMinute();
        $schedule->command('queue:restart')->everyMinute();
        // $schedule->command('queue:work')->everyMinute();
        $schedule->command('queue:work --stop-when-empty')->everyMinute();

        // Example: Other scheduled tasks (You can add more)
        // $schedule->command('backup:run')->dailyAt('02:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
