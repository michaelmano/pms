<?php

namespace App\Support;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

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
     * Base Guzzle client.
     */
    private $client;

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
     * The Applications Access Token starting with `xoxp-`.
     */
    private $application_access_token;

    /**
     * The slack applciation Webook URL.
     */
    private $application_webhook_url;

    /**
     * A list of emojis available from the workspace.
     */
    private $emojis;

    public function __construct()
    {
        /*
         * The config required for the service.
         */
        $this->application_id = config('services.slack.application_id');
        $this->application_client_id = config('services.slack.application_client_id');
        $this->application_client_secret = config('services.slack.application_client_secret');
        $this->application_signing_secret = config('services.slack.application_signing_secret');
        $this->application_bot_token = config('services.slack.application_bot_token');
        $this->application_access_token = config('services.slack.application_access_token');
        $this->application_webhook_url = config('services.slack.application_webhook_url');

        /*
         * The default API Client.
         */
        $this->api_client = new Client([
            'base_uri' => 'https://slack.com/api/',
        ]);

        /*
         * The webhook API Client.
         */
        $this->webhook_client = new Client([
            'base_uri' => $this->application_webhook_url,
        ]);

        /*
         * The emojis available on the workspace.
         */
        $this->emojis = $this->setupEmojis();
    }

    /**
     * Return a list of all available emojis on the workspace.
     */
    public function getEmojis()
    {
        return $this->emojis;
    }

    /**
     * Request the emojis if they are not cached or returned the ones previously requested.
     */
    private function setupEmojis()
    {
        if (Cache::has('slack:emojis')) {
            return Cache::get('slack:emojis');
        }

        return Cache::remember('slack:emojis', 1440, function () {
            $response = $this->api_client->get('emoji.list', [
                'query' => [
                    'token' => $this->application_access_token,
                ],
            ]);

            return $this->decode($response)->emoji;
        });
    }

    private function decode($response)
    {
        return json_decode($response->getBody()->getContents());
    }
}
