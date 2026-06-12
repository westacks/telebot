<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InputRichMessage;

/**
 * Use this method to stream a partial rich message to a user while the message is being generated. Note that the streamed draft is ephemeral and acts as a temporary 30-second preview - once the output is finalized, you must call sendRichMessage with the complete message to persist it in the user's chat. Returns True on success.
 *
 * @property-read int $chat_id Unique identifier for the target private chat
 * @property-read ?int $message_thread_id Unique identifier for the target message thread
 * @property-read int $draft_id Unique identifier of the message draft; must be non-zero. Changes to drafts with the same identifier are animated.
 * @property-read InputRichMessage $rich_message The partial message to be streamed
 *
 * @see https://core.telegram.org/bots/api#sendrichmessagedraft
 */
class SendRichMessageDraftMethod extends TelegramMethod
{
    protected string $method = 'sendRichMessageDraft';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $chat_id,
        public readonly ?int $message_thread_id,
        public readonly int $draft_id,
        public readonly InputRichMessage $rich_message,
    ) {
    }
}
