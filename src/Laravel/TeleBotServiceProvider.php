<?php

namespace WeStacks\TeleBot\Laravel;

use Illuminate\Support\ServiceProvider;
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

        $this->publishes([
            __DIR__.'/config/telebot.php' => config_path('telebot.php'),
        ]);
    }

    private function registerBindings()
    {
        $this->app->singleton(BotManager::class, function ($app) {
            return new BotManager(config('telebot'));
        });
        $this->app->alias(BotsManager::class, 'telebot');
    }
}