<?php

namespace App\Http\Controllers;

use App\Jobs\ScheduleUserJob;
use App\Models\User;
use App\Models\VaccineCenter;
use App\Notifications\ScheduledUserNotification;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\AsScheduledTask;

class ScheduleController extends Controller
{
    public function scheduleUser()  {
        $today = today();
        $schedule_date = $today->addDay()->toDateString();

        $centers = VaccineCenter::with(['users' => function ($query) {
            $query->orderBy('created_at', 'asc')->where('status', 'Not_Scheduled');
        }])->get();

        foreach ($centers as $center) {

            $schedule_count = 0;
            foreach ($center->users as $user) {

                if ( $schedule_count < $center->daily_limit) {

                    ScheduleUserJob::dispatch($user, $schedule_date);
                    $schedule_count++;
                }
            }
        }

    }
}
