<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    /** @test */
    public function a_status_of_200_should_be_given()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
