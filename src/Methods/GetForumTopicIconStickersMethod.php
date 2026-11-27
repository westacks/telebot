<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
 *
 *
 * @see https://core.telegram.org/bots/api#getforumtopiciconstickers
 */
class GetForumTopicIconStickersMethod extends TelegramMethod
{
    protected string $method = 'getForumTopicIconStickers';
    protected array $expect = ['Sticker[]'];

    public function __construct()
    {
    }
}
