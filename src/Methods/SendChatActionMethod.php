<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.  Example: The [ImageBot](https://t.me/imagebot) needs some time to process a request and upload the image. Instead of sending a text message along the lines of “Retrieving image, please wait…”, the bot may use [sendChatAction](https://core.telegram.org/bots/api#sendchataction) with action = upload_photo. The user will see a “sending photo” status for the bot.  We only recommend using this method when a response from the bot will take a __noticeable__ amount of time to arrive.
 *
 * @property string $business_connection_id __Required: Optional__. Unique identifier of the business connection on behalf of which the action will be sent
 * @property string $chat_id                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int    $message_thread_id      __Required: Optional__. Unique identifier for the target message thread; for supergroups only
 * @property string $action                 __Required: Yes__. Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for [text messages](https://core.telegram.org/bots/api#sendmessage), upload_photo for [photos](https://core.telegram.org/bots/api#sendphoto), record_video or upload_video for [videos](https://core.telegram.org/bots/api#sendvideo), record_voice or upload_voice for [voice notes](https://core.telegram.org/bots/api#sendvoice), upload_document for [general files](https://core.telegram.org/bots/api#senddocument), choose_sticker for [stickers](https://core.telegram.org/bots/api#sendsticker), find_location for [location data](https://core.telegram.org/bots/api#sendlocation), record_video_note or upload_video_note for [video notes](https://core.telegram.org/bots/api#sendvideonote).
 */
class SendChatActionMethod extends TelegramMethod
{
    protected string $method = 'sendChatAction';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'message_thread_id' => 'integer',
        'action' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
