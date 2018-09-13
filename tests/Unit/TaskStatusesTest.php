<?php

namespace Tests\Unit;

use Tests\TestCase;

class TaskStatusesTest extends TestCase
{
    /** @test */
    public function a_task_status_can_have_many_tasks()
    {
        factory(\App\Task::class, 4)->create([
            'task_status_id' => 1,
        ]);
        $task_status = \App\TaskStatus::find(1);

        $this->assertEquals($task_status->tasks()->count(), 4);
    }
}
