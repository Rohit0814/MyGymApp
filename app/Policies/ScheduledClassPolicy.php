<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ScheduledClass;

class ScheduledClassPolicy
{
    public function delete(User $user, ScheduledClass $scheduledClass){
        return $user->id === $scheduledClass->instructor_id;
    }
}
