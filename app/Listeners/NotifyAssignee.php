<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Support\Facades\Log;

class NotifyAssignee
{
    public function handle(TaskCreated $event): void
    {
        $task = $event->task;

        if ($task->assigned_to) {
            Log::info('Task assigned to user', [
                'task_id' => $task->id,
                'user_id' => $task->assigned_to,
                'title' => $task->title,
            ]);
        }
    }
}