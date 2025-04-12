<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents a message.
 * @property-read int $message_id Unique message identifier inside this chat. In specific instances (e.g., message containing a video sent to a big chat), the server might automatically schedule a message instead of sending it immediately. In such cases, this field will be 0 and the relevant message will be unusable until it is actually sent
 * @property-read ?int $message_thread_id Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
 * @property-read ?User $from Optional. Sender of the message; may be empty for messages sent to channels. For backward compatibility, if the message was sent on behalf of a chat, the field contains a fake sender user in non-channel chats
 * @property-read ?Chat $sender_chat Optional. Sender of the message when sent on behalf of a chat. For example, the supergroup itself for messages sent by its anonymous administrators or a linked channel for messages automatically forwarded to the channel's discussion group. For backward compatibility, if the message was sent on behalf of a chat, the field from contains a fake sender user in non-channel chats.
 * @property-read ?int $sender_boost_count Optional. If the sender of the message boosted the chat, the number of boosts added by the user
 * @property-read ?User $sender_business_bot Optional. The bot that actually sent the message on behalf of the business account. Available only for outgoing messages sent on behalf of the connected business account.
 * @property-read int $date Date the message was sent in Unix time. It is always a positive number, representing a valid date.
 * @property-read ?string $business_connection_id Optional. Unique identifier of the business connection from which the message was received. If non-empty, the message belongs to a chat of the corresponding business account that is independent from any potential bot chat which might share the same identifier.
 * @property-read Chat $chat Chat the message belongs to
 * @property-read ?MessageOrigin $forward_origin Optional. Information about the original message for forwarded messages
 * @property-read ?true $is_topic_message Optional. True, if the message is sent to a forum topic
 * @property-read ?true $is_automatic_forward Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
 * @property-read ?Message $reply_to_message Optional. For replies in the same chat and message thread, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @property-read ?ExternalReplyInfo $external_reply Optional. Information about the message that is being replied to, which may come from another chat or forum topic
 * @property-read ?TextQuote $quote Optional. For replies that quote part of the original message, the quoted part of the message
 * @property-read ?Story $reply_to_story Optional. For replies to a story, the original story
 * @property-read ?User $via_bot Optional. Bot through which the message was sent
 * @property-read ?int $edit_date Optional. Date the message was last edited in Unix time
 * @property-read ?true $has_protected_content Optional. True, if the message can't be forwarded
 * @property-read ?true $is_from_offline Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting business message, or as a scheduled message
 * @property-read ?string $media_group_id Optional. The unique identifier of a media message group this message belongs to
 * @property-read ?string $author_signature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
 * @property-read ?int $paid_star_count Optional. The number of Telegram Stars that were paid by the sender of the message to send it
 * @property-read ?string $text Optional. For text messages, the actual UTF-8 text of the message
 * @property-read ?MessageEntity[] $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
 * @property-read ?LinkPreviewOptions $link_preview_options Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed
 * @property-read ?string $effect_id Optional. Unique identifier of the message effect added to the message
 * @property-read ?Animation $animation Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
 * @property-read ?Audio $audio Optional. Message is an audio file, information about the file
 * @property-read ?Document $document Optional. Message is a general file, information about the file
 * @property-read ?PaidMediaInfo $paid_media Optional. Message contains paid media; information about the paid media
 * @property-read ?PhotoSize[] $photo Optional. Message is a photo, available sizes of the photo
 * @property-read ?Sticker $sticker Optional. Message is a sticker, information about the sticker
 * @property-read ?Story $story Optional. Message is a forwarded story
 * @property-read ?Video $video Optional. Message is a video, information about the video
 * @property-read ?VideoNote $video_note Optional. Message is a video note, information about the video message
 * @property-read ?Voice $voice Optional. Message is a voice message, information about the file
 * @property-read ?string $caption Optional. Caption for the animation, audio, document, paid media, photo, video or voice
 * @property-read ?MessageEntity[] $caption_entities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
 * @property-read ?true $show_caption_above_media Optional. True, if the caption must be shown above the message media
 * @property-read ?true $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
 * @property-read ?Contact $contact Optional. Message is a shared contact, information about the contact
 * @property-read ?Dice $dice Optional. Message is a dice with random value
 * @property-read ?Game $game Optional. Message is a game, information about the game. More about games »
 * @property-read ?Poll $poll Optional. Message is a native poll, information about the poll
 * @property-read ?Venue $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
 * @property-read ?Location $location Optional. Message is a shared location, information about the location
 * @property-read ?User[] $new_chat_members Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
 * @property-read ?User $left_chat_member Optional. A member was removed from the group, information about them (this member may be the bot itself)
 * @property-read ?string $new_chat_title Optional. A chat title was changed to this value
 * @property-read ?PhotoSize[] $new_chat_photo Optional. A chat photo was change to this value
 * @property-read ?true $delete_chat_photo Optional. Service message: the chat photo was deleted
 * @property-read ?true $group_chat_created Optional. Service message: the group has been created
 * @property-read ?true $supergroup_chat_created Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @property-read ?true $channel_chat_created Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @property-read ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed Optional. Service message: auto-delete timer settings changed in the chat
 * @property-read ?int $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read ?int $migrate_from_chat_id Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read ?MaybeInaccessibleMessage $pinned_message Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @property-read ?Invoice $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments »
 * @property-read ?SuccessfulPayment $successful_payment Optional. Message is a service message about a successful payment, information about the payment. More about payments »
 * @property-read ?RefundedPayment $refunded_payment Optional. Message is a service message about a refunded payment, information about the payment. More about payments »
 * @property-read ?UsersShared $users_shared Optional. Service message: users were shared with the bot
 * @property-read ?ChatShared $chat_shared Optional. Service message: a chat was shared with the bot
 * @property-read ?GiftInfo $gift Optional. Service message: a regular gift was sent or received
 * @property-read ?UniqueGiftInfo $unique_gift Optional. Service message: a unique gift was sent or received
 * @property-read ?string $connected_website Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
 * @property-read ?WriteAccessAllowed $write_access_allowed Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
 * @property-read ?PassportData $passport_data Optional. Telegram Passport data
 * @property-read ?ProximityAlertTriggered $proximity_alert_triggered Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
 * @property-read ?ChatBoostAdded $boost_added Optional. Service message: user boosted the chat
 * @property-read ?ChatBackground $chat_background_set Optional. Service message: chat background set
 * @property-read ?ForumTopicCreated $forum_topic_created Optional. Service message: forum topic created
 * @property-read ?ForumTopicEdited $forum_topic_edited Optional. Service message: forum topic edited
 * @property-read ?ForumTopicClosed $forum_topic_closed Optional. Service message: forum topic closed
 * @property-read ?ForumTopicReopened $forum_topic_reopened Optional. Service message: forum topic reopened
 * @property-read ?GeneralForumTopicHidden $general_forum_topic_hidden Optional. Service message: the 'General' forum topic hidden
 * @property-read ?GeneralForumTopicUnhidden $general_forum_topic_unhidden Optional. Service message: the 'General' forum topic unhidden
 * @property-read ?GiveawayCreated $giveaway_created Optional. Service message: a scheduled giveaway was created
 * @property-read ?Giveaway $giveaway Optional. The message is a scheduled giveaway message
 * @property-read ?GiveawayWinners $giveaway_winners Optional. A giveaway with public winners was completed
 * @property-read ?GiveawayCompleted $giveaway_completed Optional. Service message: a giveaway without public winners was completed
 * @property-read ?PaidMessagePriceChanged $paid_message_price_changed Optional. Service message: the price for paid messages has changed in the chat
 * @property-read ?VideoChatScheduled $video_chat_scheduled Optional. Service message: video chat scheduled
 * @property-read ?VideoChatStarted $video_chat_started Optional. Service message: video chat started
 * @property-read ?VideoChatEnded $video_chat_ended Optional. Service message: video chat ended
 * @property-read ?VideoChatParticipantsInvited $video_chat_participants_invited Optional. Service message: new participants invited to a video chat
 * @property-read ?WebAppData $web_app_data Optional. Service message: data sent by a Web App
 * @property-read ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends MaybeInaccessibleMessage
{
    public function __construct(
        public readonly int $message_id,
        public readonly ?int $message_thread_id,
        public readonly ?User $from,
        public readonly ?Chat $sender_chat,
        public readonly ?int $sender_boost_count,
        public readonly ?User $sender_business_bot,
        public readonly int $date,
        public readonly ?string $business_connection_id,
        public readonly Chat $chat,
        public readonly ?MessageOrigin $forward_origin,
        public readonly ?true $is_topic_message,
        public readonly ?true $is_automatic_forward,
        public readonly ?Message $reply_to_message,
        public readonly ?ExternalReplyInfo $external_reply,
        public readonly ?TextQuote $quote,
        public readonly ?Story $reply_to_story,
        public readonly ?User $via_bot,
        public readonly ?int $edit_date,
        public readonly ?true $has_protected_content,
        public readonly ?true $is_from_offline,
        public readonly ?string $media_group_id,
        public readonly ?string $author_signature,
        public readonly ?int $paid_star_count,
        public readonly ?string $text,
        public readonly ?array $entities,
        public readonly ?LinkPreviewOptions $link_preview_options,
        public readonly ?string $effect_id,
        public readonly ?Animation $animation,
        public readonly ?Audio $audio,
        public readonly ?Document $document,
        public readonly ?PaidMediaInfo $paid_media,
        public readonly ?array $photo,
        public readonly ?Sticker $sticker,
        public readonly ?Story $story,
        public readonly ?Video $video,
        public readonly ?VideoNote $video_note,
        public readonly ?Voice $voice,
        public readonly ?string $caption,
        public readonly ?array $caption_entities,
        public readonly ?true $show_caption_above_media,
        public readonly ?true $has_media_spoiler,
        public readonly ?Contact $contact,
        public readonly ?Dice $dice,
        public readonly ?Game $game,
        public readonly ?Poll $poll,
        public readonly ?Venue $venue,
        public readonly ?Location $location,
        public readonly ?array $new_chat_members,
        public readonly ?User $left_chat_member,
        public readonly ?string $new_chat_title,
        public readonly ?array $new_chat_photo,
        public readonly ?true $delete_chat_photo,
        public readonly ?true $group_chat_created,
        public readonly ?true $supergroup_chat_created,
        public readonly ?true $channel_chat_created,
        public readonly ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed,
        public readonly ?int $migrate_to_chat_id,
        public readonly ?int $migrate_from_chat_id,
        public readonly ?MaybeInaccessibleMessage $pinned_message,
        public readonly ?Invoice $invoice,
        public readonly ?SuccessfulPayment $successful_payment,
        public readonly ?RefundedPayment $refunded_payment,
        public readonly ?UsersShared $users_shared,
        public readonly ?ChatShared $chat_shared,
        public readonly ?GiftInfo $gift,
        public readonly ?UniqueGiftInfo $unique_gift,
        public readonly ?string $connected_website,
        public readonly ?WriteAccessAllowed $write_access_allowed,
        public readonly ?PassportData $passport_data,
        public readonly ?ProximityAlertTriggered $proximity_alert_triggered,
        public readonly ?ChatBoostAdded $boost_added,
        public readonly ?ChatBackground $chat_background_set,
        public readonly ?ForumTopicCreated $forum_topic_created,
        public readonly ?ForumTopicEdited $forum_topic_edited,
        public readonly ?ForumTopicClosed $forum_topic_closed,
        public readonly ?ForumTopicReopened $forum_topic_reopened,
        public readonly ?GeneralForumTopicHidden $general_forum_topic_hidden,
        public readonly ?GeneralForumTopicUnhidden $general_forum_topic_unhidden,
        public readonly ?GiveawayCreated $giveaway_created,
        public readonly ?Giveaway $giveaway,
        public readonly ?GiveawayWinners $giveaway_winners,
        public readonly ?GiveawayCompleted $giveaway_completed,
        public readonly ?PaidMessagePriceChanged $paid_message_price_changed,
        public readonly ?VideoChatScheduled $video_chat_scheduled,
        public readonly ?VideoChatStarted $video_chat_started,
        public readonly ?VideoChatEnded $video_chat_ended,
        public readonly ?VideoChatParticipantsInvited $video_chat_participants_invited,
        public readonly ?WebAppData $web_app_data,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
