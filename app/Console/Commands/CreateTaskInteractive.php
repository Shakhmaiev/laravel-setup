<?php

namespace App\Console\Commands;

use App\Events\TaskCreated;
use App\Models\Task;
use Illuminate\Console\Command;

class CreateTaskInteractive extends Command
{
    protected $signature = 'tasks:create-interactive';

    protected $description = 'Create task interactively';

    public function handle()
    {
        $title = $this->ask('Enter task title');
        $description = $this->ask('Enter task description');
        $projectId = $this->ask('Enter project ID');
        $dueDate = $this->ask('Enter due date');
        $assignedTo = $this->ask('Enter assignee user ID');

        $status = $this->choice(
            'Choose task status',
            ['new', 'in_progress', 'done'],
            0
        );

        if (!$this->confirm('Save this task?', true)) {
            $this->warn('Task creation cancelled.');

            return;
        }

        $task = Task::create([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'project_id' => $projectId,
            'author_id' => 1,
            'assigned_to' => $assignedTo,
            'due_date' => $dueDate,
        ]);

        TaskCreated::dispatch($task);

        $this->info('Task created successfully. ID: ' . $task->id);
    }
}