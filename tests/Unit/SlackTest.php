<?php

namespace Tests\Unit;

use Tests\TestCase;

class SlackTest extends TestCase
{
    /** @test */
    public function the_service_configuration_has_slack_details()
    {
        $this->assertNotEmpty(config('services.slack.id'));
        $this->assertNotEmpty(config('services.slack.client_id'));
        $this->assertNotEmpty(config('services.slack.client_secret'));
        $this->assertNotEmpty(config('services.slack.signing_secret'));
        $this->assertNotEmpty(config('services.slack.bot_token'));
        $this->assertNotEmpty(config('services.slack.access_token'));
        $this->assertNotEmpty(config('services.slack.webhook_url'));
    }

    /** @test */
    public function the_slack_service_is_available_via_the_slack_facade_and_can_request_the_workspace_emojis()
    {
        $emojis = \Slack::getEmojis();

        $this->assertTrue(gettype($emojis) == 'object');
    }
}
