<?php

namespace WeStacks\TeleBot\Laravel\Providers;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Laravel\Notifications\TelegramChannel;
use WeStacks\TeleBot\Laravel\TeleBot;

class TeleBotServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'telebot');
        $this->loadRoutesFrom(__DIR__.'/../routes/telebot.php');
        $this->mergeConfigFrom(__DIR__.'/../config/telebot.php', 'telebot');

        $this->publishes([
            __DIR__.'/../config/telebot.php' => $this->app->configPath('telebot.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../views' => $this->app->resourcePath('views/vendor/telebot'),
        ], 'views');
    }

    public function register()
    {
        $this->commands([
            \WeStacks\TeleBot\Laravel\Artisan\WebhookCommand::class,
            \WeStacks\TeleBot\Laravel\Artisan\LongPollCommad::class,
            \WeStacks\TeleBot\Laravel\Artisan\CommandsCommand::class,
        ]);

        $this->app->singleton(BotManager::class, function () {
            return new BotManager(config('telebot'));
        });
        $this->app->alias(BotManager::class, 'telebot');

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('telegram', function ($app) {
                return $app->make(TelegramChannel::class);
            });
        });
    }

    public function provides()
    {
        return [BotManager::class, 'telebot'];
    }
}
