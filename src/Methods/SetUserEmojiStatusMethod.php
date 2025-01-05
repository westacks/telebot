<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Changes the emoji status for a given user that previously allowed the bot to manage their emoji status via the Mini App method [requestEmojiStatusAccess](https://core.telegram.org/bots/webapps#initializing-mini-apps). Returns True on success.
 *
 * @property int    $user_id                      __Required: Yes__. Unique identifier of the target user
 * @property string $emoji_status_custom_emoji_id __Required: Optional__. Custom emoji identifier of the emoji status to set. Pass an empty string to remove the status.
 * @property int    $emoji_status_expiration_date __Required: Optional__. Expiration date of the emoji status, if any
 */
class SetUserEmojiStatusMethod extends TelegramMethod
{
    protected string $method = 'setUserEmojiStatus';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'emoji_status_custom_emoji_id' => 'string',
        'emoji_status_expiration_date' => 'integer',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
