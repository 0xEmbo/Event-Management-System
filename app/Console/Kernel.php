<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Notification;
use App\Notifications\DeleteEvent;

use App\Event;
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
            $previous_event = Event::where('ends_at', '<=', Carbon::now());
            if($previous_event){
                $previous_event->delete();
                $applicants = $previous_event->get()->applicants;
                foreach ($applicants as $applicant){
                    Notification::route('mail', $applicant->email)->notify(new DeleteEvent($previous_event));
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
