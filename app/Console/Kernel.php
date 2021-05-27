<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Notification;
use App\Notifications\DeleteEvent;

use App\Event;
use App\Notifications\FinishedEvent;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Scheduler for finished events (soft delete)
        $schedule->call(function () {
            $previous_events = Event::where('ends_at', '<=', Carbon::now())->get();
            if($previous_events){
                foreach($previous_events as $previous_event){
                    $applicants = $previous_event->applicants;
                    $previous_event->delete();
                    foreach ($applicants as $applicant){
                        Notification::route('mail', $applicant->email)->notify(new FinishedEvent($previous_event));
                    }
                }
            }
        })->everyMinute();
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
