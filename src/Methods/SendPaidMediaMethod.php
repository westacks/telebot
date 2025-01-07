<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Keyboard;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\PaidMediaInfo;
use WeStacks\TeleBot\Objects\PaidMediaPreview;
use WeStacks\TeleBot\Objects\ReplyParameters;

/**
 * Use this method to send paid media. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string           $business_connection_id   __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * @property string           $chat_id                  __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername). If the chat is a channel, all Telegram Star proceeds from this media will be credited to the chat's balance. Otherwise, they will be credited to the bot's balance.
 * @property int              $star_count               __Required: Yes__. The number of Telegram Stars that must be paid to buy access to the media; 1-2500
 * @property InputPaidMedia[] $media                    __Required: Yes__. A JSON-serialized array describing the media to be sent; up to 10 items
 * @property string           $payload                  __Required: Optional__. Bot-defined paid media payload, 0-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * @property string           $caption                  __Required: Optional__. Media caption, 0-1024 characters after entities parsing
 * @property string           $parse_mode               __Required: Optional__. Mode for parsing entities in the media caption. See [formatting options](https://core.telegram.org/bots/api#formatting-options) for more details.
 * @property MessageEntity[]  $caption_entities         __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool             $show_caption_above_media __Required: Optional__. Pass True, if the caption must be shown above the message media
 * @property bool             $disable_notification     __Required: Optional__. Sends the message [silently](https://telegram.org/blog/channels-2-0#silent-messages). Users will receive a notification with no sound.
 * @property bool             $protect_content          __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property bool             $allow_paid_broadcast     __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring [broadcasting limits](https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once) for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * @property ReplyParameters  $reply_parameters         __Required: Optional__. Description of the message to reply to
 * @property Keyboard         $reply_markup             __Required: Optional__. Additional interface options. A JSON-serialized object for an [inline keyboard](https://core.telegram.org/bots/features#inline-keyboards), [custom reply keyboard](https://core.telegram.org/bots/features#keyboards), instructions to remove a reply keyboard or to force a reply from the user
 */
class SendPaidMediaMethod extends TelegramMethod
{
    protected string $method = 'sendPaidMedia';

    protected string $expect = 'Message';

    protected array $parameters = [
        'business_connection_id' => 'string',
        'chat_id' => 'string',
        'star_count' => 'integer',
        'media' => 'InputPaidMedia[]',
        'payload' => 'string',
        'caption' => 'string',
        'parse_mode' => 'string',
        'caption_entities' => 'MessageEntity[]',
        'show_caption_above_media' => 'boolean',
        'disable_notification' => 'boolean',
        'protect_content' => 'boolean',
        'allow_paid_broadcast' => 'boolean',
        'reply_parameters' => 'ReplyParameters',
        'reply_markup' => 'Keyboard',
    ];

    public function mock($arguments)
    {
        return new Message([
            'chat' => [
                'id' => $arguments['chat_id'] ?? rand(1, 100),
            ],
            'message_id' => $arguments['message_id'] ?? rand(1, 100),
            'text' => $arguments['caption'] ?? 'Test',
            'reply_markup' => $arguments['reply_markup'] ?? [],
            'entities' => $arguments['caption_entities'] ?? [],
            'paid_media' => new PaidMediaInfo([
                'star_count' => rand(1, 100),
                'paid_media' => [
                    new PaidMediaPreview([
                        'type' => 'preview',
                        'width' => rand(1, 100),
                        'height' => rand(1, 100),
                        'duration' => rand(1, 100),
                    ]),
                ],
            ]),
        ]);
    }
}
