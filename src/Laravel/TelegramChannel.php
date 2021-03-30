<?php

namespace WeStacks\TeleBot\Laravel;

use Exception;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
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
        try {
            /** @scrutinizer ignore-call */ 
            $data = $notification->toTelegram($notifiable);
            if (is_string($data)) {
                $data = new TelegramNotification($data);
            }
            $data = $data->jsonSerialize();

            $bot = $data['bot']; 
            $res = [];

            foreach ($data['actions'] as $action) {
                $method = $action['method'];
                $arguments = $action['arguments'];
                $res[] = $this->botmanager->bot($bot)->async(false)->exceptions(true)->$method($arguments);
            }

            return $res;
        }
        catch (Exception $e) {
            Log::warning($e);
            return null;
        }
    }
}