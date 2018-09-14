<?php

namespace App\Http\Controllers\Slack;

use Auth;
use Slack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlackController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the user to the slack oauth URL.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth()
    {
        return Slack::auth();
    }

    /**
     * Send another request to slack to get the users token.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(Request $request)
    {
        $response = Slack::requestAccessToken($request->get('code'));
        if ($response->ok) {
            Auth::user()->profile->update([
                'slack_token' => $response->access_token,
                'slack_id' => $response->user_id,
            ]);

            return redirect()->route('profile.index');
        }
    }

    /**
     * Store the returned token in the users table.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }
}
