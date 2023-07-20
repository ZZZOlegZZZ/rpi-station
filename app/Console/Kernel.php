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
        Commands\initrzd::class,
        Commands\initrzd2021::class,
        Commands\initRzdVs::class,
        Commands\initrzdtst::class,
        Commands\sendTestData::class,
        Commands\initWh24p::class,
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
        $schedule->call(function () {
            \App\Measurement::pollModules();
            \App\Measurement::processRaw();
        })->everyFiveMinutes();

        $schedule->call(function () {
            if (isset(\App\Configuration::find(1)->settings->power) && intval(\App\Configuration::find(1)->settings->power) > 0) {
                \App\Measurement::pollModules();
                \App\Measurement::processRaw();
            }
        })->everyMinute();

        $schedule->call(function () {
            \App\ftpClient::upload();
            \App\PushClient::pushData();
        })->everyMinute();

        $schedule->call(function () {
            \App\Power::getStatus();
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
