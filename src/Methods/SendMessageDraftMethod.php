<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Use this method to stream a partial message to a user while the message is being generated; supported only for bots with forum topic mode enabled. Returns True on success.
 *
 * @property-read int $chat_id Unique identifier for the target private chat
 * @property-read ?int $message_thread_id Unique identifier for the target message thread
 * @property-read int $draft_id Unique identifier of the message draft; must be non-zero. Changes of drafts with the same identifier are animated
 * @property-read string $text Text of the message to be sent, 1-4096 characters after entities parsing
 * @property-read ?string $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
 * @property-read ?MessageEntity[] $entities A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 *
 * @see https://core.telegram.org/bots/api#sendmessagedraft
 */
class SendMessageDraftMethod extends TelegramMethod
{
    protected string $method = 'sendMessageDraft';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $chat_id,
        public readonly ?int $message_thread_id,
        public readonly int $draft_id,
        public readonly string $text,
        public readonly ?string $parse_mode,
        public readonly ?array $entities,
    ) {
    }
}
