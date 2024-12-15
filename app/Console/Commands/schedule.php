<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScheduleController;
use Illuminate\Console\Command;

class schedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduleUser:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule users to vaccine';

    /**
     * Execute the console command.
     */
    public function handle(ScheduleController $scheduleController)
    {
        try {
            if ($this->checkIfWeekend()) {
                $scheduleController->scheduleUser();
                $this->info('Users scheduled for vaccination successfully.');
                return Command::SUCCESS;
            }

        } catch (\Exception $e) {
            $this->error('An error occurred while scheduling users: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
    private function checkIfWeekend()  {
        $dayOfWeek = now()->addDays(1)->format('l');
        if (in_array($dayOfWeek, ['Friday', 'Saturday'])) {
            $this->info("Tomorrow is {$dayOfWeek}");
            return false;
        }else{
            return true;
        }
    }
}
