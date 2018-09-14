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
 * oauth page (https://api.slack.com/apps/{{ID}}/oauth)
 */
class Slack
{
    /**
     * Base API Guzzle client.
     */
    private $api_client;

    /**
     * Webhook API Guzzle client.
     */
    private $webhook_client;

    /**
     * Scopes that we can use.
     */
    private $scopes;

    /**
     * The slack applciation ID.
     */
    private $id;

    /**
     * The slack applciation Client ID.
     */
    private $client_id;

    /**
     * The slack applciation Client Secret.
     */
    private $client_secret;

    /**
     * The slack applciation Signing Secret.
     */
    private $signing_secret;

    /**
     * The Bot User OAuth Access Token starting with `xoxb-`.
     */
    private $bot_token;

    /**
     * The Applications Access Token starting with `xoxp-`.
     */
    private $access_token;

    /**
     * The slack applciation Webook URL.
     */
    private $webhook_url;

    /**
     * A list of emojis available from the workspace.
     */
    private $emojis;

    public function __construct()
    {
        /*
         * The config required for the service.
         */
        $this->id = config('services.slack.id');
        $this->client_id = config('services.slack.client_id');
        $this->client_secret = config('services.slack.client_secret');
        $this->signing_secret = config('services.slack.signing_secret');
        $this->bot_token = config('services.slack.bot_token');
        $this->access_token = config('services.slack.access_token');
        $this->webhook_url = config('services.slack.webhook_url');
        $this->scopes = config('services.slack.scopes');
        $this->redirect_uri = config('services.slack.redirect_uri');

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
            'base_uri' => $this->webhook_url,
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
     * Authenticate the current user and return their token.
     */
    public function auth()
    {
        $url = [
            'https://slack.com/oauth/authorize?client_id=',
            $this->client_id,
            '&scope=',
            implode(' ', $this->scopes),
            '&redirect_uri=',
            $this->redirect_uri,
        ];

        return redirect(implode($url));
    }

    /**
     * Request the access token for the provided code.
     */
    public function requestAccessToken($code)
    {
        $response = $this->api_client->post('oauth.access', [
            'query' => [
                'code' => $code,
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'redirect_uri' => $this->redirect_uri,
            ],
        ]);

        $response = $this->decode($response);

        if ($response->ok) {
            return $response;
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the users status.
     */
    public function setStatus($user, $status)
    {
        $profile = [
            'profile' => [
                'status_emoji' => $status['emoji'],
                'status_text' => $status['text'],
                'status_expiration' => $status['expiration'],
            ],
        ];

        $response = $this->api_client->post('users.profile.set', [
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Bearer ' . $user->profile->slack_token,
                'X-Slack-User' => $user->profile->slack_id,
            ],
            'json' => $profile,
        ]);

        $response = $this->decode($response);

        if ($response->ok) {
            return $response;
        } else {
            return abort(403, 'Unauthorized action.');
        }

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
                    'token' => $this->access_token,
                ],
            ]);

            $response = $this->decode($response);

            if ($response->emoji) {
                return collect($response->emoji)->filter(function ($emoji) {
                    return filter_var($emoji, FILTER_VALIDATE_URL);
                });
            }
        });
    }

    private function decode($response)
    {
        return json_decode($response->getBody()->getContents());
    }
}
