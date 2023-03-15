<?php

namespace WeStacks\TeleBot\Laravel\Notifications;

use Exception;
use GuzzleHttp\Promise\Utils;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Notifications\Events\NotificationFailed;
use Illuminate\Notifications\Events\NotificationSending;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Notifications\Notification;
use WeStacks\TeleBot\BotManager;

class TelegramChannel
{
    public function __construct(
        protected BotManager $botmanager,
        private Dispatcher $dispatcher,
    ) {
    }

    /**
     * Send Telegram Notification.
     *
     * @return mixed
     */
    public function send(mixed $notifiable, Notification $notification)
    {
        $data = call_user_func([$notification, 'toTelegram'], $notifiable);
        $data = new TelegramNotification((string) $data);
        $data = $data->jsonSerialize();
        $bot = $this->botmanager->bot($data['bot'] ?? null);

        $this->dispatcher->dispatch(new NotificationSending($notifiable, $notification, static::class));

        $promises = [];
        $errors = [];

        foreach (($data['actions'] ?? []) as $action) {
            $promises[] = $bot->async()->exceptions()
                ->{$action['method']}($action['arguments'])
                ->otherwise(function (Exception $exception) use (&$errors) {
                    $errors[] = $exception;
                    report($exception);

                    return $exception;
                });
        }

        $results = Utils::unwrap($promises);
        $report = count($errors) ?
            new NotificationFailed($notifiable, $notification, static::class, $results) :
            new NotificationSent($notifiable, $notification, static::class, $results);

        $this->dispatcher->dispatch($report);

        return $results;
    }
}
