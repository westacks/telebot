<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use Illuminate\Notifications\Notification;
use WeStacks\TeleBot\Laravel\TelegramChannel;

class TelegramNotification extends Notification
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return [
            'bot'       => 'bot',           // Optional. Bot name to send notification. Default bot used if not specified.
            'method'    => 'sendMessage',   // Optional. Telegram API method to send notification. Default: `sendMessage`
            'data'      => [                // Method parameters.
                'chat_id'   => $notifiable->telegram_chat_id,
                'text'      => 'Hello, from Laravel\'s notifications!' 
            ]
        ];
    }
}