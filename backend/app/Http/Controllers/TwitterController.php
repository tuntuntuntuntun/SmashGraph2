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

    // 入力された文字列を画像にしてツイートする
    public function tweet(Request $request)
    {
        $text = $request->text;

        // 22字ずつに分割し配列へ
        $text = mb_str_split($text, 22);

        $img = \Image::canvas(1000, 700, '#ffffff');

        // 文字の位置を調整
        $left = $img->width() / 2;
        if (count($text) > 1) {
            $top = $img->height() / 2 - count($text) * 18;
        } else {
            $top = $img->height() / 2;
        }

        // 文字をいれる
        for($i = 0; $i < count($text); $i++) {
            $img->text($text[$i], $left, $top + $i * 30, function($font) {
                $font->file(storage_path('app/public/NotoSansJP-Black.otf'));
                $font->size(30);
                $font->color('#000');
                $font->align('center');
                $font->valign('top');
                $font->angle(0);
            });
        }

        $save_path = storage_path('app/public/tweet.png');
        $img->save($save_path);

        \Notification::route(TwitterChannel::class, '')->notify(new TwitterNotification($save_path));

        return redirect('/');
    }
}