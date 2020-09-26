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
    protected $bot; 

    public function __construct()
    {
        $this->bot = TeleBot::getFacadeRoot();
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

        return $this->bot->bot($bot)->async(false)->exceptions(true)->$method($data);
    }
}