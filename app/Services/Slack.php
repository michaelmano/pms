<?php

namespace App\Services;

use Log;

class Slack
{
    public static function sendWelcomeMessage($user)
    {
        $message = "$user->first_name has signed up!";

        return Log::channel('slack')->info($message);
    }
}
