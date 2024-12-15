<?php
namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;


class updateVaccinationStatus extends Command
{
    protected $signature = 'vaccination:update-status';
    protected $description = 'Update vaccination status of users whose schedule_date is in the past';

    public function handle()
    {
        $this->info('Starting vaccination status update...');

        User::where('status', 'Scheduled')->chunk(100, function ($users) {
            foreach ($users as $user) {
                try {
                    $userDate = Carbon::createFromFormat('Y-m-d', $user->schedule_date);

                    if ($userDate->lessThan(Carbon::now())) {
                        $user->status = 'Vaccinated';
                        if ($user->save()) {
                            $this->info("User ID: {$user->id} status updated successfully.");
                        } else {
                            $this->error("Failed to update status for user ID: {$user->id}.");
                        }
                    } else {
                        $this->info("User ID: {$user->id} schedule_date is not in the past.");
                    }
                } catch (\Exception $e) {
                    $this->error("Error parsing date for user ID: {$user->id}. Exception: {$e->getMessage()}");
                }

            }
        });

        $this->info('Vaccination status update complete.');
    }



}
