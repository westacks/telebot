<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read InputFile $photo New chat photo, uploaded using multipart/form-data
 *
 * @see https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod extends TelegramMethod
{
    protected string $method = 'setChatPhoto';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly InputFile $photo,
    ) {
    }
}
