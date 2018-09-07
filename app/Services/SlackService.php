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
     * Find a specific users details in slack
     */
    public function find(User $user)
    {
        $data = json_decode($this->getUsers());

        return collect($data->members)
            ->filter(function ($member) {
                return isset($member->profile->email);
            })
            ->first(function ($value, $key) use ($user) {
                return $value->profile->email === $user->email;
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
            return Cache::remember('slack:users', 60, function () {
                return $this->client
                    ->get($this->slack_api_routes['list_users'])
                    ->getBody()
                    ->getContents();
            });
        } catch (RequestException $exception) {
        }
    }
}
