<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read string $sticker_set_name Name of the sticker set to be set as the group sticker set
 *
 * @see https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetMethod extends TelegramMethod
{
    protected string $method = 'setChatStickerSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $sticker_set_name,
    ) {
    }
}
