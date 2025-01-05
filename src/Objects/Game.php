<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @property string          $title         Title of the game
 * @property string          $description   Description of the game
 * @property PhotoSize[]     $photo         Photo that will be displayed in the game message in chats.
 * @property string          $text          Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls [setGameScore](https://core.telegram.org/bots/api#setgamescore), or manually edited using [editMessageText](https://core.telegram.org/bots/api#editmessagetext). 0-4096 characters.
 * @property MessageEntity[] $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property Animation       $animation     Optional. Animation that will be displayed in the game message in chats. Upload via [BotFather](https://t.me/botfather)
 */
class Game extends TelegramObject
{
    protected $attributes = [
        'title' => 'string',
        'description' => 'string',
        'photo' => 'PhotoSize[]',
        'text' => 'string',
        'text_entities' => 'MessageEntity[]',
        'animation' => 'Animation',
    ];
}
