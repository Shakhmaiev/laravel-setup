<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class GenerateTaskReport extends Command
{
    protected $signature = 'tasks:report {--project_id=}';

    protected $description = 'Generate tasks report';

    public function handle()
    {
        $projectId = $this->option('project_id');

        $query = Task::query();

        if ($projectId) {
            $query->where('project_id', $projectId);
        }

        $tasks = $query->get();

        if ($tasks->isEmpty()) {
            $this->warn('No tasks found.');

            return;
        }

        $this->info('Tasks report:');

        $this->table(
            ['ID', 'Title', 'Status', 'Due date'],
            $tasks->map(function ($task) {
                return [
                    $task->id,
                    $task->title,
                    $task->status,
                    $task->due_date,
                ];
            })->toArray()
        );
    }
}