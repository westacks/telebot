<?php

namespace WeStacks\TeleBot\Laravel;

use Illuminate\Support\ServiceProvider;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Laravel\Artisan\CommandsCommand;
use WeStacks\TeleBot\Laravel\Artisan\LongPollCommad;
use WeStacks\TeleBot\Laravel\Artisan\WebhookCommand;

class TeleBotServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->registerCommands();
        }
        $this->registerBindings();
    }

    public function provides()
    {
        return [BotManager::class, 'telebot'];
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
        $this->app->alias(BotManager::class, 'telebot');
    }

    private function registerCommands()
    {
        $this->commands([
            WebhookCommand::class,
            LongPollCommad::class,
            CommandsCommand::class,
        ]);
    }
}
