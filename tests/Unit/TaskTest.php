<?php

namespace Tests\Unit;

use Tests\TestCase;

class TaskTest extends TestCase
{
    /** @test */
    public function a_task_belongs_to_a_project()
    {
        $task = factory(\App\Task::class)->create();
        $this->assertNotEmpty($task->project());
    }

    /** @test */
    public function a_task_has_a_description()
    {
        $task = factory(\App\Task::class)->create();
        $this->assertNotEmpty($task->description);
    }

    /** @test */
    public function a_task_has_a_status()
    {
        $task = factory(\App\Task::class)->create();
        $this->assertNotEmpty($task->status->title);
    }
}
