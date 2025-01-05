<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Sticker;

/**
 * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of [Sticker](https://core.telegram.org/bots/api#sticker) objects.
 */
class GetForumTopicIconStickersMethod extends TelegramMethod
{
    protected string $method = 'getForumTopicIconStickers';

    protected string $expect = 'Sticker[]';

    protected array $parameters = [];

    public function mock($arguments)
    {
        return [
            new Sticker([
                'file_id' => 'test',
                'file_unique_id' => 'test',
                'width' => 100,
                'height' => 100,
                'is_animated' => false,
                'is_video' => false,
            ]),
        ];
    }
}
