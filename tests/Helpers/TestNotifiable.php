<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notifiable;

class TestNotifiable extends AnonymousNotifiable
{
    use Notifiable;

    /**
     * @var mixed
     */
    public $telegram_chat_id;

    public function __construct()
    {
        $this->telegram_chat_id = env('TELEGRAM_USER_ID');
    }
}
