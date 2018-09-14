<?php

namespace App\Http\Controllers\Profile;

use Slack;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(User $user, Request $request)
    {
        Slack::setStatus($user, $request->only('emoji', 'text', 'expiration'));

        return redirect()->back();
    }
}
