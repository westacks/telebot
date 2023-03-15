<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property string    $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property InputFile $photo   __Required: Yes__. New chat photo, uploaded using multipart/form-data
 */
class SetChatPhotoMethod extends TelegramMethod
{
    protected string $method = 'setChatPhoto';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'photo' => 'InputFile',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
