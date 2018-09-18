<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /** @test */
    public function a_client_has_a_name()
    {
        $client = factory(\App\Client::class)->create();
        $this->assertNotEmpty($client->name);
    }

    /** @test */
    public function a_client_has_an_acronym()
    {
        $client = factory(\App\Client::class)->create();
        $this->assertNotEmpty($client->acronym);
    }

     /** @test */
     public function a_client_can_have_many_projects()
     {
         $client = factory(\App\Client::class)->create();
         $project = factory(\App\Project::class)->create([
             'client_id' => $client->id,
         ]);

         $this->assertEquals($client->projects()->count(), 1);
     }
}
