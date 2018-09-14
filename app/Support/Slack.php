<?php

namespace App\Support;

/**
 * The slack service can be set up by adding an application to your slack team - https://api.slack.com/apps,
 * Create a new app and click the "Install your app to your workspace" button, then set
 * up a bot user and add all the credentials to the `config/services.php` file.
 *
 * You will also need to add a Webhook Redirect URL which can be set on the
 * oauth page (https://api.slack.com/apps/{{APPLICATION ID}}/oauth)
 */
class Slack
{
    /**
     * The slack applciation ID.
     */
    private $application_id;
    /**
     * The slack applciation Client ID.
     */
    private $application_client_id;
    /**
     * The slack applciation Client Secret.
     */
    private $application_client_secret;
    /**
     * The slack applciation Signing Secret.
     */
    private $application_signing_secret;
    /**
     * The Bot User OAuth Access Token starting with `xoxb-`.
     */
    private $application_bot_token;
    /**
     * The slack applciation Webook URL.
     */
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
