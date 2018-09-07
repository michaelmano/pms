<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\Services\SlackService;

class SlackServiceTest extends TestCase
{
    /** @test */
    public function the_service_configuration_has_slack_details()
    {
        $this->assertNotEmpty(config('services.slack'));
        $this->assertNotEmpty(config('services.slack.token'));
    }

    /** @test */
    public function the_slack_service_can_request_all_user_information()
    {
        $this->assertNotEmpty((new SlackService())->getUsers());
    }

    /** @test */
    public function the_slack_service_can_find_a_user_if_they_exist()
    {
        $slack_api = new SlackService();
        // Finds the first user with an email
        $first_slack_user = collect(
            json_decode($slack_api->getUsers())->members
        )->filter(function ($member) {
            return isset($member->profile->email);
        })->first();

        // Creates a user with that email
        $user = factory(User::class)->create([
            'email' => $first_slack_user->profile->email,
        ]);

        $this->assertNotEmpty($slack_api->find($user));
    }
}
