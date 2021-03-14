<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a service message about a voice chat started in the chat. Currently holds no information.
 */
class VoiceChatStarted extends TelegramObject
{
    protected function relations()
    {
        return [
            //
        ];
    }
}
