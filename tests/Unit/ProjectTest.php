<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test */
    public function a_project_has_a_title()
    {
        $project = factory(\App\Project::class)->create();
        $this->assertNotEmpty($project->title);
    }

    /** @test */
    public function a_project_belongs_to_a_client()
    {
        $project = factory(\App\Project::class)->create();
        $this->assertNotEmpty($project->client());
    }
}
