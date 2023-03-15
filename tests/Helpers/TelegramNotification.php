<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use Illuminate\Notifications\Notification;
use WeStacks\TeleBot\Laravel\Notifications\TelegramNotification as TNotification;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {
        return (new TNotification)->bot('bot')
            ->sendMessage([
                'chat_id' => $notifiable->telegram_chat_id,
                'text' => 'Hello, from Laravel\'s notifications!',
            ])
            ->sendMessage([
                'chat_id' => $notifiable->telegram_chat_id,
                'text' => 'Second message',
            ]);
    }
}
