<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the sticker.
 *
 * @property string                                                                                                  $type                  Type of the result, must be sticker
 * @property string                                                                                                  $id                    Unique identifier for this result, 1-64 bytes
 * @property string                                                                                                  $sticker_file_id       A valid file identifier of the sticker
 * @property InlineKeyboardMarkup                                                                                    $reply_markup          Optional. [Inline keyboard](https://core.telegram.org/bots/features#inline-keyboards) attached to the message
 * @property InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent $input_message_content Optional. Content of the message to be sent instead of the sticker
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    protected $attributes = [
        'type' => 'string',
        'id' => 'string',
        'sticker_file_id' => 'string',
        'reply_markup' => 'InlineKeyboardMarkup',
        'input_message_content' => 'InputMessageContent',
    ];
}
