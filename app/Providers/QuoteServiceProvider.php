<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Managers\QuoteManager;

class QuoteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('quote', function ($app) {
            return new QuoteManager($app);
        });
    }
}
