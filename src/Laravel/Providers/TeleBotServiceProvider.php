<?php

namespace WeStacks\TeleBot\Laravel\Providers;

use Illuminate\Http\Request;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Laravel\Notifications\TelegramChannel;
use WeStacks\TeleBot\Laravel\Services\TelegramWebAppService;

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

        $this->app->singleton(BotManager::class, fn () => new BotManager(config('telebot')));
        $this->app->alias(BotManager::class, 'telebot');

        Notification::resolved(fn (ChannelManager $service) =>
            $service->extend('telegram', fn ($app) => $app->make(TelegramChannel::class))
        );

        Request::macro('telegramWebAppUser', fn (?string $key = null, $default = null) =>
            Arr::get(app(TelegramWebAppService::class)->user(), $key, $default)
        );
    }

    public function provides()
    {
        return [BotManager::class, 'telebot'];
    }
}
