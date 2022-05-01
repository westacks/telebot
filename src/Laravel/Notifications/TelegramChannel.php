<?php

namespace WeStacks\TeleBot\Laravel\Notifications;

use Exception;
use GuzzleHttp\Promise\Utils;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\BotManager;

class TelegramChannel
{
    /**
     * @var BotManager
     */
    protected $botmanager;

    public function __construct(BotManager $botmanager)
    {
        $this->botmanager = $botmanager;
    }

    /**
     * Send Telegram Notification.
     *
     * @param  mixed        $notifiable
     * @param  Notification $notification
     * @return mixed
     */
    public function send($notifiable, Notification $notification)
    {
        if (! method_exists($notification, 'toTelegram')) {
            return null;
        }

        $data = call_user_func([$notification, 'toTelegram'], $notifiable);
        $data = new TelegramNotification((string) $data);
        $data = $data->jsonSerialize();
        $bot = $this->botmanager->bot($data['bot'] ?? null);

        $promises = [];

        foreach (($data['actions'] ?? []) as $action) {
            $promises[] = $bot->async()->exceptions()
                ->{$action['method']}($action['arguments'])
                ->otherwise(function (Exception $e) {
                    Log::error("Error while sending notification to Telegram: {$e->getMessage()}");
                });
        }

        return Utils::unwrap($promises);
    }
}
