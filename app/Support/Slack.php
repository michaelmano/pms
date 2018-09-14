<?php

namespace App\Support;

class Slack
{
    private $application_id;
    private $application_client_id;
    private $application_client_secret;
    private $application_signing_secret;
    private $application_bot_token;
    private $application_webhook_url;

    public function __construct()
    {
        $this->application_id = config('services.slack.application_id');
        $this->application_client_id = config('services.slack.application_client_id');
        $this->application_client_secret = config('services.slack.application_client_secret');
        $this->application_signing_secret = config('services.slack.application_signing_secret');
        $this->application_bot_token = config('services.slack.application_bot_token');
        $this->application_webhook_url = config('services.slack.application_webhook_url');
    }

    public function config()
    {
        return [
            $this->application_id,
            $this->application_client_id,
            $this->application_client_secret,
            $this->application_signing_secret,
            $this->application_bot_token,
            $this->application_webhook_url,
        ];
    }
}
