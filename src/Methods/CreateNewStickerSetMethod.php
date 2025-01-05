<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputSticker;

/**
 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
 *
 * @property int            $user_id          __Required: Yes__. User identifier of created sticker set owner
 * @property string         $name             __Required: Yes__. Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
 * @property string         $title            __Required: Yes__. Sticker set title, 1-64 characters
 * @property InputSticker[] $stickers         __Required: Yes__. A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
 * @property string         $sticker_type     __Required: Optional__. Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular sticker set is created.
 * @property bool           $needs_repainting __Required: Optional__. Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji sticker sets only
 */
class CreateNewStickerSetMethod extends TelegramMethod
{
    protected string $method = 'createNewStickerSet';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'user_id' => 'integer',
        'name' => 'string',
        'title' => 'string',
        'stickers' => 'InputSticker[]',
        'sticker_type' => 'string',
        'needs_repainting' => 'boolean',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
