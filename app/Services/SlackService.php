<?php

namespace App\Services;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class SlackService
{
    /**
     * The main http client.
     */
    private $client;

    /**
     * The default slack api routes.
     */
    private $slack_api_routes = [
        'list_users' => 'https://slack.com/api/users.list',
    ];

    public function __construct()
    {
        $this->client = new Client([
            'query' => [
                'token' => config('services.slack.token'),
            ],
        ]);
    }

    /**
     * Search for a specific user email.
     */
    public function find(User $user)
    {
        return $this->search('email', $user->email);
    }

    /**
     * Filter the slack user data by terms provided.
     *
     * @param string $slackKey    - The profile key we are searching by
     * @param string $searchValue - The value the key must match
     *
     * @return object $slack_user
     */
    public function search($slackKey, $searchValue)
    {
        $data = json_decode($this->getUsers());

        return collect($data->members)
            ->filter(function ($member) {
                return isset($member->profile->email);
            })
            ->first(function ($value, $key) use ($slackKey, $searchValue) {
                return $value->profile->$slackKey === $searchValue;
            });
    }

    /**
     * List Users.
     */
    public function getUsers()
    {
        if (Cache::has('slack:users')) {
            return Cache::get('slack:users');
        }
        try {
            return Cache::remember('slack:users', 1440, function () {
                return $this->client
                    ->get($this->slack_api_routes['list_users'])
                    ->getBody()
                    ->getContents();
            });
        } catch (RequestException $exception) {
        }
    }
}
