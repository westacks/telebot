<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 * @property-read MessageOrigin $origin Origin of the message replied to by the given message
 * @property-read ?Chat $chat Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
 * @property-read ?int $message_id Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup or a channel.
 * @property-read ?LinkPreviewOptions $link_preview_options Optional. Options used for link preview generation for the original message, if it is a text message
 * @property-read ?Animation $animation Optional. Message is an animation, information about the animation
 * @property-read ?Audio $audio Optional. Message is an audio file, information about the file
 * @property-read ?Document $document Optional. Message is a general file, information about the file
 * @property-read ?PaidMediaInfo $paid_media Optional. Message contains paid media; information about the paid media
 * @property-read ?PhotoSize[] $photo Optional. Message is a photo, available sizes of the photo
 * @property-read ?Sticker $sticker Optional. Message is a sticker, information about the sticker
 * @property-read ?Story $story Optional. Message is a forwarded story
 * @property-read ?Video $video Optional. Message is a video, information about the video
 * @property-read ?VideoNote $video_note Optional. Message is a video note, information about the video message
 * @property-read ?Voice $voice Optional. Message is a voice message, information about the file
 * @property-read ?true $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
 * @property-read ?Contact $contact Optional. Message is a shared contact, information about the contact
 * @property-read ?Dice $dice Optional. Message is a dice with random value
 * @property-read ?Game $game Optional. Message is a game, information about the game. More about games »
 * @property-read ?Giveaway $giveaway Optional. Message is a scheduled giveaway, information about the giveaway
 * @property-read ?GiveawayWinners $giveaway_winners Optional. A giveaway with public winners was completed
 * @property-read ?Invoice $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments »
 * @property-read ?Location $location Optional. Message is a shared location, information about the location
 * @property-read ?Poll $poll Optional. Message is a native poll, information about the poll
 * @property-read ?Venue $venue Optional. Message is a venue, information about the venue
 *
 * @see https://core.telegram.org/bots/api#externalreplyinfo
 */
class ExternalReplyInfo extends TelegramObject
{
    public function __construct(
        public readonly MessageOrigin $origin,
        public readonly ?Chat $chat,
        public readonly ?int $message_id,
        public readonly ?LinkPreviewOptions $link_preview_options,
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
        public readonly ?true $has_media_spoiler,
        public readonly ?Contact $contact,
        public readonly ?Dice $dice,
        public readonly ?Game $game,
        public readonly ?Giveaway $giveaway,
        public readonly ?GiveawayWinners $giveaway_winners,
        public readonly ?Invoice $invoice,
        public readonly ?Location $location,
        public readonly ?Poll $poll,
        public readonly ?Venue $venue,
    ) {
    }
}
