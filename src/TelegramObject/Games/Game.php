<?php

namespace WeStacks\TeleBot\TelegramObject\Games;

use WeStacks\TeleBot\TelegramObject\Animation;
use WeStacks\TeleBot\TelegramObject\MessageEntity;
use WeStacks\TeleBot\TelegramObject\PhotoSize;
use WeStacks\TeleBot\TelegramObject;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 * 
 * @property String                    $title                    Title of the game
 * @property String                    $description              Description of the game
 * @property Array<PhotoSize>          $photo                    Photo that will be displayed in the game message in chats.
 * @property String                    $text                     _Optional_. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
 * @property Array<MessageEntity>      $text_entities            _Optional_. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property Animation                 $animation                _Optional_. Animation that will be displayed in the game message in chats. Upload via BotFather
 * 
 * @package WeStacks\TeleBot\TelegramObject\Games
 */
class Game extends TelegramObject
{
    protected function relations()
    {
        return [
            'title'         => 'string',
            'description'   => 'string',
            'photo'         => array(PhotoSize::class),
            'text'          => 'string',
            'text_entities' => array(MessageEntity::class),
            'animation'     => Animation::class
        ];
    }
}