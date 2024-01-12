<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ScheduledClass;

class IncrementDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increment-date {--days=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment all the scheduled date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledClasses = ScheduledClass::latest('date_time')->get();
        $scheduledClasses->each(function($class){
            $class->date_time = $class->date_time->addDays($this->option('days'));
            $class->save();
        });
    }
}
