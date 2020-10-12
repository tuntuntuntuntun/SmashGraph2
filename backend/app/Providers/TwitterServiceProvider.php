<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('twitter', function () {

            $config = config('services.twitter');

            return new TwitterOAuth($config['consumer_key'], $config['consumer_secret'], $config['access_token'], $config['access_secret']);

        });
    }

    public function provides()
    {
        return ['twitter'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
