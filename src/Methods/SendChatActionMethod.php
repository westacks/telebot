<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 *
 * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
 *
 * @property-read ?string $business_connection_id Unique identifier of the business connection on behalf of which the action will be sent
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property-read ?int $message_thread_id Unique identifier for the target message thread; for supergroups only
 * @property-read string $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
 *
 * @see https://core.telegram.org/bots/api#sendchataction
 */
class SendChatActionMethod extends TelegramMethod
{
    protected string $method = 'sendChatAction';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?string $business_connection_id,
        public readonly int|string $chat_id,
        public readonly ?int $message_thread_id,
        public readonly string $action,
    ) {
    }
}
