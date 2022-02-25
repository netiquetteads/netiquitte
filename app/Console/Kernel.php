<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SyncEverflowApisCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('sync:everflow')->daily();
        $schedule->command('sync:advertisers')->everyThirtyMinutes();
        $schedule->command('sync:affiliates')->everyThirtyMinutes();
        $schedule->command('sync:offers')->everyThirtyMinutes();
        $schedule->command('sync:balances')->hourly();

        $schedule->command('send:emails')->everyMinute();
        $schedule->command('update:unsubscriber')->everyMinute();
        //  ->everyMinute();

        $schedule->command('backup:clean')->daily()->at('01:30')
        ->onFailure(function () {
            // \Log::info('backup clean failed');
        })
         ->onSuccess(function () {
             // \Log::info('backup clean successfull');
         });

        $schedule->command('backup:run --only-db')->daily()->at('02:00')
        ->onFailure(function () {
            \Log::info('backup failed');
        })
         ->onSuccess(function () {
             \Log::info('backup successfull');
         });
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
