<?php

namespace WeStacks\TeleBot\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Foundation\Application as LaravelApplication;
use WeStacks\TeleBot\BotManager;

class TeleBotServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishConfig();
        $this->registerBindings();
    }

    private function publishConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/config/telebot.php', 'telebot');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/telebot.php' => config_path('telebot.php'),
            ]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('telebot');
        }
    }

    private function registerBindings()
    {
        $this->app->singleton(BotManager::class, function ($app) {
            return new BotManager(config('telebot'));
        });
        $this->app->alias(BotsManager::class, 'telebot');
    }
}