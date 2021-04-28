<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;
use WeStacks\TeleBot\Objects\Games\Game;
use WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\Passport\PassportData;
use WeStacks\TeleBot\Objects\Payments\Invoice;
use WeStacks\TeleBot\Objects\Payments\SuccessfulPayment;
use WeStacks\TeleBot\Objects\Stickers\Sticker;

/**
 * This object represents a message.
 *
 * @property int                        $message_id                           Unique message identifier inside this chat
 * @property User                       $from                                 _Optional_. Sender, empty for messages sent to channels
 * @property Chat                       $sender_chat	                      _Optional_. Sender of the message, sent on behalf of a chat. The channel itself for channel messages. The supergroup itself for messages from anonymous group administrators. The linked channel for messages automatically forwarded to the discussion group
 * @property int                        $date                                 Date the message was sent in Unix time
 * @property Chat                       $chat                                 Conversation the message belongs to
 * @property User                       $forward_from                         _Optional_. For forwarded messages, sender of the original message
 * @property Chat                       $forward_from_chat                    _Optional_. For messages forwarded from channels, information about the original channel
 * @property int                        $forward_from_message_id              _Optional_. For messages forwarded from channels, identifier of the original message in the channel
 * @property string                     $forward_signature                    _Optional_. For messages forwarded from channels, signature of the post author if present
 * @property string                     $forward_sender_name                  _Optional_. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
 * @property int                        $forward_date                         _Optional_. For forwarded messages, date the original message was sent in Unix time
 * @property Message                    $reply_to_message                     _Optional_. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @property User                       $via_bot                              _Optional_. Bot through which the message was sent
 * @property int                        $edit_date                            _Optional_. Date the message was last edited in Unix time
 * @property string                     $media_group_id                       _Optional_. The unique identifier of a media message group this message belongs to
 * @property string                     $author_signature                     _Optional_. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
 * @property string                     $text                                 _Optional_. For text messages, the actual UTF-8 text of the message, 0-4096 characters
 * @property Array<MessageEntity>       $entities                             _Optional_. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
 * @property Animation                  $animation                            _Optional_. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
 * @property Audio                      $audio                                _Optional_. Message is an audio file, information about the file
 * @property Document                   $document                             _Optional_. Message is a general file, information about the file
 * @property Array<PhotoSize>           $photo                                _Optional_. Message is a photo, available sizes of the photo
 * @property Sticker                    $sticker                              _Optional_. Message is a sticker, information about the sticker
 * @property Video                      $video                                _Optional_. Message is a video, information about the video
 * @property VideoNote                  $video_note                           _Optional_. Message is a video note, information about the video message
 * @property Voice                      $voice                                _Optional_. Message is a voice message, information about the file
 * @property string                     $caption                              _Optional_. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters
 * @property Array<MessageEntity>       $caption_entities                     _Optional_. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
 * @property Contact                    $contact                              _Optional_. Message is a shared contact, information about the contact
 * @property Dice                       $dice                                 _Optional_. Message is a dice with random value from 1 to 6
 * @property Game                       $game                                 _Optional_. Message is a game, information about the game
 * @property Poll                       $poll                                 _Optional_. Message is a native poll, information about the poll
 * @property Venue                      $venue                                _Optional_. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
 * @property Location                   $location                             _Optional_. Message is a shared location, information about the location
 * @property Array<User>                $new_chat_members                     _Optional_. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
 * @property User                       $left_chat_member                     _Optional_. A member was removed from the group, information about them (this member may be the bot itself)
 * @property string                     $new_chat_title                       _Optional_. A chat title was changed to this value
 * @property Array<PhotoSize>           $new_chat_photo                       _Optional_. A chat photo was change to this value
 * @property true                       $delete_chat_photo                    _Optional_. Service message: the chat photo was deleted
 * @property true                       $group_chat_created                   _Optional_. Service message: the group has been created
 * @property true                       $supergroup_chat_created              _Optional_. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @property true                       $channel_chat_created                 _Optional_. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @property int                        $migrate_to_chat_id                   _Optional_. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property int                        $migrate_from_chat_id                 _Optional_. The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property Message                    $pinned_message                       _Optional_. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
 * @property Invoice                    $invoice                              _Optional_. Message is an invoice for a payment, information about the invoice
 * @property SuccessfulPayment          $successful_payment                   _Optional_. Message is a service message about a successful payment, information about the payment
 * @property string                     $connected_website                    _Optional_. The domain name of the website on which the user has logged in
 * @property PassportData               $passport_data                        _Optional_. Telegram Passport data
 * @property ProximityAlertTriggered    $proximity_alert_triggered            _Optional_. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
 * @property InlineKeyboardMarkup       $reply_markup                         _Optional_. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 */
class Message extends TelegramObject
{
    protected function relations()
    {
        return [
            'message_id' => 'integer',
            'from' => User::class,
            'sender_chat' => Chat::class,
            'date' => 'integer',
            'chat' => Chat::class,
            'forward_from' => User::class,
            'forward_from_chat' => Chat::class,
            'forward_from_message_id' => 'integer',
            'forward_signature' => 'string',
            'forward_sender_name' => 'string',
            'forward_date' => 'integer',
            'reply_to_message' => Message::class,
            'via_bot' => User::class,
            'edit_date' => 'integer',
            'media_group_id' => 'string',
            'author_signature' => 'string',
            'text' => 'string',
            'entities' => [MessageEntity::class],
            'animation' => Animation::class,
            'audio' => Audio::class,
            'document' => Document::class,
            'photo' => [PhotoSize::class],
            'sticker' => Sticker::class,
            'video' => Video::class,
            'video_note' => VideoNote::class,
            'voice' => Voice::class,
            'caption' => 'string',
            'caption_entities' => [MessageEntity::class],
            'contact' => Contact::class,
            'dice' => Dice::class,
            'game' => Game::class,
            'poll' => Poll::class,
            'venue' => Venue::class,
            'location' => Location::class,
            'new_chat_members' => [User::class],
            'left_chat_member' => User::class,
            'new_chat_title' => 'string',
            'new_chat_photo' => [PhotoSize::class],
            'delete_chat_photo' => 'boolean',
            'group_chat_created' => 'boolean',
            'supergroup_chat_created' => 'boolean',
            'channel_chat_created' => 'boolean',
            'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
            'migrate_to_chat_id' => 'integer',
            'migrate_from_chat_id' => 'integer',
            'pinned_message' => Message::class,
            'invoice' => Invoice::class,
            'successful_payment' => SuccessfulPayment::class,
            'connected_website' => 'string',
            'passport_data' => PassportData::class,
            'proximity_alert_triggered' => ProximityAlertTriggered::class,
            'voice_chat_started' => VoiceChatStarted::class,
            'voice_chat_scheduled' => VoiceChatScheduled::class,
            'voice_chat_ended' => VoiceChatEnded::class,
            'voice_chat_participants_invited' => VoiceChatParticipantsInvited::class,
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}
