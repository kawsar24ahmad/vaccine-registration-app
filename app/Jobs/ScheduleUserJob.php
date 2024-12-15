<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\ScheduledUserNotification;

class ScheduleUserJob implements ShouldQueue
{
    use Queueable;

    public $user;
    public $schedule_date;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user, $schedule_date)
    {
        $this->user = $user;
        $this->schedule_date = $schedule_date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->status ='Scheduled';
        $this->user->schedule_date =$this->schedule_date;
        $this->user->save();

        $this->user->notify(new ScheduledUserNotification($this->schedule_date));
    }
}
