<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Sends a gift to the given user. The gift can't be converted to Telegram Stars by the user. Returns True on success.
 *
 * @property int             $user_id         __Required: Yes__. Unique identifier of the target user that will receive the gift
 * @property string          $gift_id         __Required: Yes__. Identifier of the gift
 * @property bool            $pay_for_upgrade __Required: Optional__. Pass True to pay for the gift upgrade from the bot's balance, thereby making the upgrade free for the receiver
 * @property string          $text            __Required: Optional__. Text that will be shown along with the gift; 0-255 characters
 * @property string          $text_parse_mode __Required: Optional__. Mode for parsing entities in the text. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 * @property MessageEntity[] $text_entities   __Required: Optional__. A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 */
class SendGiftMethod extends TelegramMethod
{
    protected string $method = 'sendGift';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'gift_id' => 'string',
        'pay_for_upgrade' => 'boolean',
        'text' => 'string',
        'text_parse_mode' => 'string',
        'text_entities' => 'MessageEntity[]',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
