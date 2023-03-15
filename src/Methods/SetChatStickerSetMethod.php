<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method. Returns True on success.
 *
 * @property string $chat_id          __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property string $sticker_set_name __Required: Yes__. Name of the sticker set to be set as the group sticker set
 */
class SetChatStickerSetMethod extends TelegramMethod
{
    protected string $method = 'setChatStickerSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'sticker_set_name' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
