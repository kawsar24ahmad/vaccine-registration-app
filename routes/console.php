<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('scheduleUser:create')->dailyAt('21:00');
Schedule::command('vaccination:update-status')->daily();



