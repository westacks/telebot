<?php

namespace WeStacks\TeleBot\Laravel;

use Illuminate\Notifications\Notification;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;

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
     * Send Telegram Notification
     * 
     * @param mixed $notifiable 
     * @param Notification $notification 
     * @return mixed 
     * @throws TeleBotMehtodException 
     * @throws TeleBotObjectException 
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toTelegram($notifiable);

        $bot = $message['bot'] ?? null;
        $method = $message['method'] ?? 'sendMessage';
        $data = $message['data'] ?? [];

        return $this->botmanager->bot($bot)->async(false)->exceptions(true)->$method($data);
    }
}