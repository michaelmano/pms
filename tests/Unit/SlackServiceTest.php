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
    }

    /** @test */
    public function the_slack_config_has_a_token()
    {
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
        // Gets slack data
        $slack_data = json_decode((new SlackService())->getUsers());

        // Finds the first user with an email
        $first_slack_user = collect($slack_data->members)
            ->filter(function ($member) {
                return isset($member->profile->email);
            })->first();

        // Creates a user with that email
        $user = factory(User::class)->create([
            'email' => $first_slack_user->profile->email,
        ]);

        $api = new SlackService();

        $this->assertNotEmpty($api->find($user));
    }
}
