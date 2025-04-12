<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 * @property-read string $title Title of the game
 * @property-read string $description Description of the game
 * @property-read PhotoSize[] $photo Photo that will be displayed in the game message in chats.
 * @property-read ?string $text Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
 * @property-read ?MessageEntity[] $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property-read ?Animation $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
 *
 * @see https://core.telegram.org/bots/api#game
 */
class Game extends TelegramObject
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly array $photo,
        public readonly ?string $text,
        public readonly ?array $text_entities,
        public readonly ?Animation $animation,
    ) {
    }
}
