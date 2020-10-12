<?php

namespace App\Http\Controllers;

use App\Notifications\TwitterNotification;
use Illuminate\Http\Request;
use NotificationChannels\Twitter\TwitterChannel;

class TwitterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function tweet(Request $request)
    {
        $text = $request->text;
        \Notification::route(TwitterChannel::class, '')->notify(new TwitterNotification($request->text));

        return redirect('/');
    }
}