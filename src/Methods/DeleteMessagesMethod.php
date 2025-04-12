<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations on which messages can be deleted
 *
 * @see https://core.telegram.org/bots/api#deletemessages
 */
class DeleteMessagesMethod extends TelegramMethod
{
    protected string $method = 'deleteMessages';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly array $message_ids,
    ) {
    }
}
