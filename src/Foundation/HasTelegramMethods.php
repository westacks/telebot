<?php

namespace WeStacks\TeleBot\Foundation;

use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotDescription;
use WeStacks\TeleBot\Objects\BotName;
use WeStacks\TeleBot\Objects\BotShortDescription;
use WeStacks\TeleBot\Objects\BusinessConnection;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;
use WeStacks\TeleBot\Objects\ChatFullInfo;
use WeStacks\TeleBot\Objects\ChatInviteLink;
use WeStacks\TeleBot\Objects\ChatMember;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\ForumTopic;
use WeStacks\TeleBot\Objects\GameHighScore;
use WeStacks\TeleBot\Objects\MenuButton;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageId;
use WeStacks\TeleBot\Objects\Poll;
use WeStacks\TeleBot\Objects\PreparedInlineMessage;
use WeStacks\TeleBot\Objects\SentWebAppMessage;
use WeStacks\TeleBot\Objects\StarAmount;
use WeStacks\TeleBot\Objects\StarTransactions;
use WeStacks\TeleBot\Objects\Stars;
use WeStacks\TeleBot\Objects\Sticker;
use WeStacks\TeleBot\Objects\StickerSet;
use WeStacks\TeleBot\Objects\Story;
use WeStacks\TeleBot\Objects\Telegram;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\UserChatBoosts;
use WeStacks\TeleBot\Objects\UserProfilePhotos;
use WeStacks\TeleBot\Objects\WebhookInfo;

/**
 * This trait contains documentation for all Telegram methods.
 *
 * @method PromiseInterface|Update[] getUpdates(...$parameters) Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
 *
 * {@see https://core.telegram.org/bots/api#getupdates}
 *
 * Parameters:
 * - _int_ `$offset` __Required: Optional__. Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will be forgotten.
 * - _int_ `$limit` __Required: Optional__. Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 * - _int_ `$timeout` __Required: Optional__. Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
 * - _string[]_ `$allowed_updates` __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to getUpdates, so unwanted updates may be received for a short period of time.
 *
 *
 * @method PromiseInterface|true setWebhook(...$parameters) Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request (a request with response HTTP status code different from 2XY), we will repeat the request and give up after a reasonable amount of attempts. Returns True on success.
 *
 * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
 *
 * {@see https://core.telegram.org/bots/api#setwebhook}
 *
 * Parameters:
 * - _string_ `$url` __Required: Yes__. HTTPS URL to send updates to. Use an empty string to remove webhook integration
 * - _InputFile_ `$certificate` __Required: Optional__. Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
 * - _string_ `$ip_address` __Required: Optional__. The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
 * - _int_ `$max_connections` __Required: Optional__. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
 * - _string[]_ `$allowed_updates` __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
 * - _bool_ `$drop_pending_updates` __Required: Optional__. Pass True to drop all pending updates
 * - _string_ `$secret_token` __Required: Optional__. A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a webhook set by you.
 *
 *
 * @method PromiseInterface|true deleteWebhook(...$parameters) Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletewebhook}
 *
 * Parameters:
 * - _bool_ `$drop_pending_updates` __Required: Optional__. Pass True to drop all pending updates
 *
 *
 * @method PromiseInterface|WebhookInfo getWebhookInfo(...$parameters) Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 *
 * {@see https://core.telegram.org/bots/api#getwebhookinfo}
 * @method PromiseInterface|User getMe(...$parameters) A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
 *
 * {@see https://core.telegram.org/bots/api#getme}
 * @method PromiseInterface|true logOut(...$parameters) Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
 *
 * {@see https://core.telegram.org/bots/api#logout}
 * @method PromiseInterface|true close(...$parameters) Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
 *
 * {@see https://core.telegram.org/bots/api#close}
 * @method PromiseInterface|Message sendMessage(...$parameters) Use this method to send text messages. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendmessage}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$text` __Required: Yes__. Text of the message to be sent, 1-4096 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the message text. See formatting options for more details.
 * - _MessageEntity[]_ `$entities` __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * - _LinkPreviewOptions_ `$link_preview_options` __Required: Optional__. Link preview generation options for the message
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message forwardMessage(...$parameters) Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#forwardmessage}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _int|string_ `$from_chat_id` __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * - _int_ `$video_start_timestamp` __Required: Optional__. New start timestamp for the forwarded video in the message
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the forwarded message from forwarding and saving
 * - _int_ `$message_id` __Required: Yes__. Message identifier in the chat specified in from_chat_id
 *
 *
 * @method PromiseInterface|MessageId[] forwardMessages(...$parameters) Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
 *
 * {@see https://core.telegram.org/bots/api#forwardmessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _int|string_ `$from_chat_id` __Required: Yes__. Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
 * - _int[]_ `$message_ids` __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers must be specified in a strictly increasing order.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the messages silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the forwarded messages from forwarding and saving
 *
 *
 * @method PromiseInterface|MessageId copyMessage(...$parameters) Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
 *
 * {@see https://core.telegram.org/bots/api#copymessage}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _int|string_ `$from_chat_id` __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Message identifier in the chat specified in from_chat_id
 * - _int_ `$video_start_timestamp` __Required: Optional__. New start timestamp for the copied video in the message
 * - _string_ `$caption` __Required: Optional__. New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the new caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|MessageId[] copyMessages(...$parameters) Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
 *
 * {@see https://core.telegram.org/bots/api#copymessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _int|string_ `$from_chat_id` __Required: Yes__. Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
 * - _int[]_ `$message_ids` __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers must be specified in a strictly increasing order.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the messages silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * - _bool_ `$remove_caption` __Required: Optional__. Pass True to copy the messages without their captions
 *
 *
 * @method PromiseInterface|Message sendPhoto(...$parameters) Use this method to send photos. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendphoto}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$photo` __Required: Yes__. Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files »
 * - _string_ `$caption` __Required: Optional__. Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the photo caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media
 * - _bool_ `$has_spoiler` __Required: Optional__. Pass True if the photo needs to be covered with a spoiler animation
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendAudio(...$parameters) Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
 *
 * For sending voice messages, use the sendVoice method instead.
 *
 * {@see https://core.telegram.org/bots/api#sendaudio}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$audio` __Required: Yes__. Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
 * - _string_ `$caption` __Required: Optional__. Audio caption, 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the audio caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _int_ `$duration` __Required: Optional__. Duration of the audio in seconds
 * - _string_ `$performer` __Required: Optional__. Performer
 * - _string_ `$title` __Required: Optional__. Track name
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendDocument(...$parameters) Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 *
 * {@see https://core.telegram.org/bots/api#senddocument}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$document` __Required: Yes__. File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * - _string_ `$caption` __Required: Optional__. Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the document caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$disable_content_type_detection` __Required: Optional__. Disables automatic server-side content type detection for files uploaded using multipart/form-data
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendVideo(...$parameters) Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 *
 * {@see https://core.telegram.org/bots/api#sendvideo}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$video` __Required: Yes__. Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More information on Sending Files »
 * - _int_ `$duration` __Required: Optional__. Duration of sent video in seconds
 * - _int_ `$width` __Required: Optional__. Video width
 * - _int_ `$height` __Required: Optional__. Video height
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * - _InputFile|string_ `$cover` __Required: Optional__. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 * - _int_ `$start_timestamp` __Required: Optional__. Start timestamp for the video in the message
 * - _string_ `$caption` __Required: Optional__. Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the video caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media
 * - _bool_ `$has_spoiler` __Required: Optional__. Pass True if the video needs to be covered with a spoiler animation
 * - _bool_ `$supports_streaming` __Required: Optional__. Pass True if the uploaded video is suitable for streaming
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendAnimation(...$parameters) Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 *
 * {@see https://core.telegram.org/bots/api#sendanimation}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$animation` __Required: Yes__. Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More information on Sending Files »
 * - _int_ `$duration` __Required: Optional__. Duration of sent animation in seconds
 * - _int_ `$width` __Required: Optional__. Animation width
 * - _int_ `$height` __Required: Optional__. Animation height
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * - _string_ `$caption` __Required: Optional__. Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the animation caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media
 * - _bool_ `$has_spoiler` __Required: Optional__. Pass True if the animation needs to be covered with a spoiler animation
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendVoice(...$parameters) Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 *
 * {@see https://core.telegram.org/bots/api#sendvoice}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$voice` __Required: Yes__. Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
 * - _string_ `$caption` __Required: Optional__. Voice message caption, 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _int_ `$duration` __Required: Optional__. Duration of the voice message in seconds
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendVideoNote(...$parameters) As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendvideonote}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$video_note` __Required: Yes__. Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More information on Sending Files ». Sending video notes by a URL is currently unsupported
 * - _int_ `$duration` __Required: Optional__. Duration of sent video in seconds
 * - _int_ `$length` __Required: Optional__. Video width and height, i.e. diameter of the video message
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendPaidMedia(...$parameters) Use this method to send paid media. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendpaidmedia}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername). If the chat is a channel, all Telegram Star proceeds from this media will be credited to the chat's balance. Otherwise, they will be credited to the bot's balance.
 * - _int_ `$star_count` __Required: Yes__. The number of Telegram Stars that must be paid to buy access to the media; 1-10000
 * - _InputPaidMedia[]_ `$media` __Required: Yes__. A JSON-serialized array describing the media to be sent; up to 10 items
 * - _string_ `$payload` __Required: Optional__. Bot-defined paid media payload, 0-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * - _string_ `$caption` __Required: Optional__. Media caption, 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the media caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message[] sendMediaGroup(...$parameters) Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Message objects that were sent is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendmediagroup}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputMedia[]_ `$media` __Required: Yes__. A JSON-serialized array describing messages to be sent, must include 2-10 items
 * - _bool_ `$disable_notification` __Required: Optional__. Sends messages silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 *
 *
 * @method PromiseInterface|Message sendLocation(...$parameters) Use this method to send point on the map. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendlocation}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _float_ `$latitude` __Required: Yes__. Latitude of the location
 * - _float_ `$longitude` __Required: Yes__. Longitude of the location
 * - _float_ `$horizontal_accuracy` __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * - _int_ `$live_period` __Required: Optional__. Period in seconds during which the location will be updated (see Live Locations, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
 * - _int_ `$heading` __Required: Optional__. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * - _int_ `$proximity_alert_radius` __Required: Optional__. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendVenue(...$parameters) Use this method to send information about a venue. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendvenue}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _float_ `$latitude` __Required: Yes__. Latitude of the venue
 * - _float_ `$longitude` __Required: Yes__. Longitude of the venue
 * - _string_ `$title` __Required: Yes__. Name of the venue
 * - _string_ `$address` __Required: Yes__. Address of the venue
 * - _string_ `$foursquare_id` __Required: Optional__. Foursquare identifier of the venue
 * - _string_ `$foursquare_type` __Required: Optional__. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * - _string_ `$google_place_id` __Required: Optional__. Google Places identifier of the venue
 * - _string_ `$google_place_type` __Required: Optional__. Google Places type of the venue. (See supported types.)
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendContact(...$parameters) Use this method to send phone contacts. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendcontact}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$phone_number` __Required: Yes__. Contact's phone number
 * - _string_ `$first_name` __Required: Yes__. Contact's first name
 * - _string_ `$last_name` __Required: Optional__. Contact's last name
 * - _string_ `$vcard` __Required: Optional__. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendPoll(...$parameters) Use this method to send a native poll. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendpoll}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$question` __Required: Yes__. Poll question, 1-300 characters
 * - _string_ `$question_parse_mode` __Required: Optional__. Mode for parsing entities in the question. See formatting options for more details. Currently, only custom emoji entities are allowed
 * - _MessageEntity[]_ `$question_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of question_parse_mode
 * - _InputPollOption[]_ `$options` __Required: Yes__. A JSON-serialized list of 2-12 answer options
 * - _bool_ `$is_anonymous` __Required: Optional__. True, if the poll needs to be anonymous, defaults to True
 * - _string_ `$type` __Required: Optional__. Poll type, “quiz” or “regular”, defaults to “regular”
 * - _bool_ `$allows_multiple_answers` __Required: Optional__. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * - _int_ `$correct_option_id` __Required: Optional__. 0-based identifier of the correct answer option, required for polls in quiz mode
 * - _string_ `$explanation` __Required: Optional__. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * - _string_ `$explanation_parse_mode` __Required: Optional__. Mode for parsing entities in the explanation. See formatting options for more details.
 * - _MessageEntity[]_ `$explanation_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of explanation_parse_mode
 * - _int_ `$open_period` __Required: Optional__. Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * - _int_ `$close_date` __Required: Optional__. Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * - _bool_ `$is_closed` __Required: Optional__. Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|Message sendChecklist(...$parameters) Use this method to send a checklist on behalf of a connected business account. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendchecklist}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int_ `$chat_id` __Required: Yes__. Unique identifier for the target chat
 * - _InputChecklist_ `$checklist` __Required: Yes__. A JSON-serialized object for the checklist to send
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. A JSON-serialized object for description of the message to reply to
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard
 *
 *
 * @method PromiseInterface|Message sendDice(...$parameters) Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#senddice}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$emoji` __Required: Optional__. Emoji on which the dice throw animation is based. Currently, must be one of “”, “”, “”, “”, “”, or “”. Dice can have values 1-6 for “”, “” and “”, values 1-5 for “” and “”, and values 1-64 for “”. Defaults to “”
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|true sendChatAction(...$parameters) Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 *
 * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
 *
 * {@see https://core.telegram.org/bots/api#sendchataction}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the action will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread; for supergroups only
 * - _string_ `$action` __Required: Yes__. Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
 *
 *
 * @method PromiseInterface|true setMessageReaction(...$parameters) Use this method to change the chosen reactions on a message. Service messages of some types can't be reacted to. Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmessagereaction}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Identifier of the target message. If the message belongs to a media group, the reaction is set to the first non-deleted message in the group instead.
 * - _ReactionType[]_ `$reaction` __Required: Optional__. A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users, bots can set up to one reaction per message. A custom emoji reaction can be used if it is either already present on the message or explicitly allowed by chat administrators. Paid reactions can't be used by bots.
 * - _bool_ `$is_big` __Required: Optional__. Pass True to set the reaction with a big animation
 *
 *
 * @method PromiseInterface|UserProfilePhotos getUserProfilePhotos(...$parameters) Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
 *
 * {@see https://core.telegram.org/bots/api#getuserprofilephotos}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _int_ `$offset` __Required: Optional__. Sequential number of the first photo to be returned. By default, all photos are returned.
 * - _int_ `$limit` __Required: Optional__. Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 *
 *
 * @method PromiseInterface|true setUserEmojiStatus(...$parameters) Changes the emoji status for a given user that previously allowed the bot to manage their emoji status via the Mini App method requestEmojiStatusAccess. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setuseremojistatus}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _string_ `$emoji_status_custom_emoji_id` __Required: Optional__. Custom emoji identifier of the emoji status to set. Pass an empty string to remove the status.
 * - _int_ `$emoji_status_expiration_date` __Required: Optional__. Expiration date of the emoji status, if any
 *
 *
 * @method PromiseInterface|File getFile(...$parameters) Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
 *
 * Note: This function may not preserve the original file name and MIME type. You should save the file's MIME type and name (if available) when the File object is received.
 *
 * {@see https://core.telegram.org/bots/api#getfile}
 *
 * Parameters:
 * - _string_ `$file_id` __Required: Yes__. File identifier to get information about
 *
 *
 * @method PromiseInterface|true banChatMember(...$parameters) Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#banchatmember}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _int_ `$until_date` __Required: Optional__. Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
 * - _bool_ `$revoke_messages` __Required: Optional__. Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
 *
 *
 * @method PromiseInterface|true unbanChatMember(...$parameters) Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unbanchatmember}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _bool_ `$only_if_banned` __Required: Optional__. Do nothing if the user is not banned
 *
 *
 * @method PromiseInterface|true restrictChatMember(...$parameters) Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#restrictchatmember}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _ChatPermissions_ `$permissions` __Required: Yes__. A JSON-serialized object for new user permissions
 * - _bool_ `$use_independent_chat_permissions` __Required: Optional__. Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * - _int_ `$until_date` __Required: Optional__. Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
 *
 *
 * @method PromiseInterface|true promoteChatMember(...$parameters) Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#promotechatmember}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _bool_ `$is_anonymous` __Required: Optional__. Pass True if the administrator's presence in the chat is hidden
 * - _bool_ `$can_manage_chat` __Required: Optional__. Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages, ignore slow mode, and send messages to the chat without paying Telegram Stars. Implied by any other administrator privilege.
 * - _bool_ `$can_delete_messages` __Required: Optional__. Pass True if the administrator can delete messages of other users
 * - _bool_ `$can_manage_video_chats` __Required: Optional__. Pass True if the administrator can manage video chats
 * - _bool_ `$can_restrict_members` __Required: Optional__. Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
 * - _bool_ `$can_promote_members` __Required: Optional__. Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * - _bool_ `$can_change_info` __Required: Optional__. Pass True if the administrator can change chat title, photo and other settings
 * - _bool_ `$can_invite_users` __Required: Optional__. Pass True if the administrator can invite new users to the chat
 * - _bool_ `$can_post_stories` __Required: Optional__. Pass True if the administrator can post stories to the chat
 * - _bool_ `$can_edit_stories` __Required: Optional__. Pass True if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
 * - _bool_ `$can_delete_stories` __Required: Optional__. Pass True if the administrator can delete stories posted by other users
 * - _bool_ `$can_post_messages` __Required: Optional__. Pass True if the administrator can post messages in the channel, approve suggested posts, or access channel statistics; for channels only
 * - _bool_ `$can_edit_messages` __Required: Optional__. Pass True if the administrator can edit messages of other users and can pin messages; for channels only
 * - _bool_ `$can_pin_messages` __Required: Optional__. Pass True if the administrator can pin messages; for supergroups only
 * - _bool_ `$can_manage_topics` __Required: Optional__. Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
 *
 *
 * @method PromiseInterface|true setChatAdministratorCustomTitle(...$parameters) Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatadministratorcustomtitle}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _string_ `$custom_title` __Required: Yes__. New custom title for the administrator; 0-16 characters, emoji are not allowed
 *
 *
 * @method PromiseInterface|true banChatSenderChat(...$parameters) Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#banchatsenderchat}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$sender_chat_id` __Required: Yes__. Unique identifier of the target sender chat
 *
 *
 * @method PromiseInterface|true unbanChatSenderChat(...$parameters) Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unbanchatsenderchat}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$sender_chat_id` __Required: Yes__. Unique identifier of the target sender chat
 *
 *
 * @method PromiseInterface|true setChatPermissions(...$parameters) Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatpermissions}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _ChatPermissions_ `$permissions` __Required: Yes__. A JSON-serialized object for new default chat permissions
 * - _bool_ `$use_independent_chat_permissions` __Required: Optional__. Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 *
 *
 * @method PromiseInterface|string exportChatInviteLink(...$parameters) Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
 *
 * {@see https://core.telegram.org/bots/api#exportchatinvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|ChatInviteLink createChatInviteLink(...$parameters) Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
 *
 * {@see https://core.telegram.org/bots/api#createchatinvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$name` __Required: Optional__. Invite link name; 0-32 characters
 * - _int_ `$expire_date` __Required: Optional__. Point in time (Unix timestamp) when the link will expire
 * - _int_ `$member_limit` __Required: Optional__. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * - _bool_ `$creates_join_request` __Required: Optional__. True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
 *
 *
 * @method PromiseInterface|ChatInviteLink editChatInviteLink(...$parameters) Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
 *
 * {@see https://core.telegram.org/bots/api#editchatinvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$invite_link` __Required: Yes__. The invite link to edit
 * - _string_ `$name` __Required: Optional__. Invite link name; 0-32 characters
 * - _int_ `$expire_date` __Required: Optional__. Point in time (Unix timestamp) when the link will expire
 * - _int_ `$member_limit` __Required: Optional__. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * - _bool_ `$creates_join_request` __Required: Optional__. True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
 *
 *
 * @method PromiseInterface|ChatInviteLink createChatSubscriptionInviteLink(...$parameters) Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite link as a ChatInviteLink object.
 *
 * {@see https://core.telegram.org/bots/api#createchatsubscriptioninvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target channel chat or username of the target channel (in the format @channelusername)
 * - _string_ `$name` __Required: Optional__. Invite link name; 0-32 characters
 * - _int_ `$subscription_period` __Required: Yes__. The number of seconds the subscription will be active for before the next payment. Currently, it must always be 2592000 (30 days).
 * - _int_ `$subscription_price` __Required: Yes__. The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat; 1-10000
 *
 *
 * @method PromiseInterface|ChatInviteLink editChatSubscriptionInviteLink(...$parameters) Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
 *
 * {@see https://core.telegram.org/bots/api#editchatsubscriptioninvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$invite_link` __Required: Yes__. The invite link to edit
 * - _string_ `$name` __Required: Optional__. Invite link name; 0-32 characters
 *
 *
 * @method PromiseInterface|ChatInviteLink revokeChatInviteLink(...$parameters) Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
 *
 * {@see https://core.telegram.org/bots/api#revokechatinvitelink}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier of the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$invite_link` __Required: Yes__. The invite link to revoke
 *
 *
 * @method PromiseInterface|true approveChatJoinRequest(...$parameters) Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#approvechatjoinrequest}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 *
 *
 * @method PromiseInterface|true declineChatJoinRequest(...$parameters) Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#declinechatjoinrequest}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 *
 *
 * @method PromiseInterface|true setChatPhoto(...$parameters) Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatphoto}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _InputFile_ `$photo` __Required: Yes__. New chat photo, uploaded using multipart/form-data
 *
 *
 * @method PromiseInterface|true deleteChatPhoto(...$parameters) Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletechatphoto}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|true setChatTitle(...$parameters) Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchattitle}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$title` __Required: Yes__. New chat title, 1-128 characters
 *
 *
 * @method PromiseInterface|true setChatDescription(...$parameters) Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatdescription}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$description` __Required: Optional__. New chat description, 0-255 characters
 *
 *
 * @method PromiseInterface|true pinChatMessage(...$parameters) Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#pinchatmessage}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be pinned
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Identifier of a message to pin
 * - _bool_ `$disable_notification` __Required: Optional__. Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
 *
 *
 * @method PromiseInterface|true unpinChatMessage(...$parameters) Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unpinchatmessage}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be unpinned
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Identifier of the message to unpin. Required if business_connection_id is specified. If not specified, the most recent pinned message (by sending date) will be unpinned.
 *
 *
 * @method PromiseInterface|true unpinAllChatMessages(...$parameters) Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unpinallchatmessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|true leaveChat(...$parameters) Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#leavechat}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|ChatFullInfo getChat(...$parameters) Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
 *
 * {@see https://core.telegram.org/bots/api#getchat}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|ChatMember[] getChatAdministrators(...$parameters) Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
 *
 * {@see https://core.telegram.org/bots/api#getchatadministrators}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|int getChatMemberCount(...$parameters) Use this method to get the number of members in a chat. Returns Int on success.
 *
 * {@see https://core.telegram.org/bots/api#getchatmembercount}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|ChatMember getChatMember(...$parameters) Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
 *
 * {@see https://core.telegram.org/bots/api#getchatmember}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 *
 *
 * @method PromiseInterface|true setChatStickerSet(...$parameters) Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatstickerset}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _string_ `$sticker_set_name` __Required: Yes__. Name of the sticker set to be set as the group sticker set
 *
 *
 * @method PromiseInterface|true deleteChatStickerSet(...$parameters) Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletechatstickerset}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|Sticker[] getForumTopicIconStickers(...$parameters) Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
 *
 * {@see https://core.telegram.org/bots/api#getforumtopiciconstickers}
 * @method PromiseInterface|ForumTopic createForumTopic(...$parameters) Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
 *
 * {@see https://core.telegram.org/bots/api#createforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _string_ `$name` __Required: Yes__. Topic name, 1-128 characters
 * - _int_ `$icon_color` __Required: Optional__. Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
 * - _string_ `$icon_custom_emoji_id` __Required: Optional__. Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
 *
 *
 * @method PromiseInterface|true editForumTopic(...$parameters) Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#editforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$message_thread_id` __Required: Yes__. Unique identifier for the target message thread of the forum topic
 * - _string_ `$name` __Required: Optional__. New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
 * - _string_ `$icon_custom_emoji_id` __Required: Optional__. New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be kept
 *
 *
 * @method PromiseInterface|true closeForumTopic(...$parameters) Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#closeforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$message_thread_id` __Required: Yes__. Unique identifier for the target message thread of the forum topic
 *
 *
 * @method PromiseInterface|true reopenForumTopic(...$parameters) Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#reopenforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$message_thread_id` __Required: Yes__. Unique identifier for the target message thread of the forum topic
 *
 *
 * @method PromiseInterface|true deleteForumTopic(...$parameters) Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deleteforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$message_thread_id` __Required: Yes__. Unique identifier for the target message thread of the forum topic
 *
 *
 * @method PromiseInterface|true unpinAllForumTopicMessages(...$parameters) Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unpinallforumtopicmessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_ `$message_thread_id` __Required: Yes__. Unique identifier for the target message thread of the forum topic
 *
 *
 * @method PromiseInterface|true editGeneralForumTopic(...$parameters) Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#editgeneralforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _string_ `$name` __Required: Yes__. New topic name, 1-128 characters
 *
 *
 * @method PromiseInterface|true closeGeneralForumTopic(...$parameters) Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#closegeneralforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|true reopenGeneralForumTopic(...$parameters) Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#reopengeneralforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|true hideGeneralForumTopic(...$parameters) Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#hidegeneralforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|true unhideGeneralForumTopic(...$parameters) Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unhidegeneralforumtopic}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|true unpinAllGeneralForumTopicMessages(...$parameters) Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 *
 *
 * @method PromiseInterface|true answerCallbackQuery(...$parameters) Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 *
 * {@see https://core.telegram.org/bots/api#answercallbackquery}
 *
 * Parameters:
 * - _string_ `$callback_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _string_ `$text` __Required: Optional__. Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
 * - _bool_ `$show_alert` __Required: Optional__. If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
 * - _string_ `$url` __Required: Optional__. URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 * - _int_ `$cache_time` __Required: Optional__. The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
 *
 *
 * @method PromiseInterface|UserChatBoosts getUserChatBoosts(...$parameters) Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a UserChatBoosts object.
 *
 * {@see https://core.telegram.org/bots/api#getuserchatboosts}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the chat or username of the channel (in the format @channelusername)
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 *
 *
 * @method PromiseInterface|BusinessConnection getBusinessConnection(...$parameters) Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success.
 *
 * {@see https://core.telegram.org/bots/api#getbusinessconnection}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 *
 *
 * @method PromiseInterface|true setMyCommands(...$parameters) Use this method to change the list of the bot's commands. See this manual for more details about bot commands. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmycommands}
 *
 * Parameters:
 * - _BotCommand[]_ `$commands` __Required: Yes__. A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
 * - _BotCommandScope_ `$scope` __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 *
 *
 * @method PromiseInterface|true deleteMyCommands(...$parameters) Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletemycommands}
 *
 * Parameters:
 * - _BotCommandScope_ `$scope` __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 *
 *
 * @method PromiseInterface|BotCommand[] getMyCommands(...$parameters) Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
 *
 * {@see https://core.telegram.org/bots/api#getmycommands}
 *
 * Parameters:
 * - _BotCommandScope_ `$scope` __Required: Optional__. A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 *
 *
 * @method PromiseInterface|true setMyName(...$parameters) Use this method to change the bot's name. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmyname}
 *
 * Parameters:
 * - _string_ `$name` __Required: Optional__. New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no dedicated name.
 *
 *
 * @method PromiseInterface|BotName getMyName(...$parameters) Use this method to get the current bot name for the given user language. Returns BotName on success.
 *
 * {@see https://core.telegram.org/bots/api#getmyname}
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 *
 *
 * @method PromiseInterface|true setMyDescription(...$parameters) Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmydescription}
 *
 * Parameters:
 * - _string_ `$description` __Required: Optional__. New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
 *
 *
 * @method PromiseInterface|BotDescription getMyDescription(...$parameters) Use this method to get the current bot description for the given user language. Returns BotDescription on success.
 *
 * {@see https://core.telegram.org/bots/api#getmydescription}
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 *
 *
 * @method PromiseInterface|true setMyShortDescription(...$parameters) Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmyshortdescription}
 *
 * Parameters:
 * - _string_ `$short_description` __Required: Optional__. New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
 *
 *
 * @method PromiseInterface|BotShortDescription getMyShortDescription(...$parameters) Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
 *
 * {@see https://core.telegram.org/bots/api#getmyshortdescription}
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 *
 *
 * @method PromiseInterface|true setChatMenuButton(...$parameters) Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setchatmenubutton}
 *
 * Parameters:
 * - _int_ `$chat_id` __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
 * - _MenuButton_ `$menu_button` __Required: Optional__. A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
 *
 *
 * @method PromiseInterface|MenuButton getChatMenuButton(...$parameters) Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
 *
 * {@see https://core.telegram.org/bots/api#getchatmenubutton}
 *
 * Parameters:
 * - _int_ `$chat_id` __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
 *
 *
 * @method PromiseInterface|true setMyDefaultAdministratorRights(...$parameters) Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setmydefaultadministratorrights}
 *
 * Parameters:
 * - _ChatAdministratorRights_ `$rights` __Required: Optional__. A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
 * - _bool_ `$for_channels` __Required: Optional__. Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
 *
 *
 * @method PromiseInterface|ChatAdministratorRights getMyDefaultAdministratorRights(...$parameters) Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 *
 * {@see https://core.telegram.org/bots/api#getmydefaultadministratorrights}
 *
 * Parameters:
 * - _bool_ `$for_channels` __Required: Optional__. Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 *
 *
 * @method PromiseInterface|Message|true editMessageText(...$parameters) Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * {@see https://core.telegram.org/bots/api#editmessagetext}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _string_ `$text` __Required: Yes__. New text of the message, 1-4096 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the message text. See formatting options for more details.
 * - _MessageEntity[]_ `$entities` __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * - _LinkPreviewOptions_ `$link_preview_options` __Required: Optional__. Link preview generation options for the message
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard.
 *
 *
 * @method PromiseInterface|Message|true editMessageCaption(...$parameters) Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * {@see https://core.telegram.org/bots/api#editmessagecaption}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _string_ `$caption` __Required: Optional__. New caption of the message, 0-1024 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the message caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_ `$show_caption_above_media` __Required: Optional__. Pass True, if the caption must be shown above the message media. Supported only for animation, photo and video messages.
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard.
 *
 *
 * @method PromiseInterface|Message|true editMessageMedia(...$parameters) Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * {@see https://core.telegram.org/bots/api#editmessagemedia}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InputMedia_ `$media` __Required: Yes__. A JSON-serialized object for a new media content of the message
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 *
 *
 * @method PromiseInterface|Message|true editMessageLiveLocation(...$parameters) Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
 *
 * {@see https://core.telegram.org/bots/api#editmessagelivelocation}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _float_ `$latitude` __Required: Yes__. Latitude of new location
 * - _float_ `$longitude` __Required: Yes__. Longitude of new location
 * - _int_ `$live_period` __Required: Optional__. New period in seconds during which the location can be updated, starting from the message send date. If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified, then live_period remains unchanged
 * - _float_ `$horizontal_accuracy` __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * - _int_ `$heading` __Required: Optional__. Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * - _int_ `$proximity_alert_radius` __Required: Optional__. The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 *
 *
 * @method PromiseInterface|Message|true stopMessageLiveLocation(...$parameters) Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
 *
 * {@see https://core.telegram.org/bots/api#stopmessagelivelocation}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message with live location to stop
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 *
 *
 * @method PromiseInterface|Message editMessageChecklist(...$parameters) Use this method to edit a checklist on behalf of a connected business account. On success, the edited Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#editmessagechecklist}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int_ `$chat_id` __Required: Yes__. Unique identifier for the target chat
 * - _int_ `$message_id` __Required: Yes__. Unique identifier for the target message
 * - _InputChecklist_ `$checklist` __Required: Yes__. A JSON-serialized object for the new checklist
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for the new inline keyboard for the message
 *
 *
 * @method PromiseInterface|Message|true editMessageReplyMarkup(...$parameters) Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
 *
 * {@see https://core.telegram.org/bots/api#editmessagereplymarkup}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard.
 *
 *
 * @method PromiseInterface|Poll stopPoll(...$parameters) Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
 *
 * {@see https://core.telegram.org/bots/api#stoppoll}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message to be edited was sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Identifier of the original message with the poll
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for a new message inline keyboard.
 *
 *
 * @method PromiseInterface|true deleteMessage(...$parameters) Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum topic creation can't be deleted.- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletemessage}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Identifier of the message to delete
 *
 *
 * @method PromiseInterface|true deleteMessages(...$parameters) Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletemessages}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int[]_ `$message_ids` __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations on which messages can be deleted
 *
 *
 * @method PromiseInterface getAvailableGifts(...$parameters) Returns the list of gifts that can be sent by the bot to users and channel chats. Requires no parameters. Returns a Gifts object.
 *
 * {@see https://core.telegram.org/bots/api#getavailablegifts}
 * @method PromiseInterface|true sendGift(...$parameters) Sends a gift to the given user or channel chat. The gift can't be converted to Telegram Stars by the receiver. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#sendgift}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Optional__. Required if chat_id is not specified. Unique identifier of the target user who will receive the gift.
 * - _int|string_ `$chat_id` __Required: Optional__. Required if user_id is not specified. Unique identifier for the chat or username of the channel (in the format @channelusername) that will receive the gift.
 * - _string_ `$gift_id` __Required: Yes__. Identifier of the gift
 * - _bool_ `$pay_for_upgrade` __Required: Optional__. Pass True to pay for the gift upgrade from the bot's balance, thereby making the upgrade free for the receiver
 * - _string_ `$text` __Required: Optional__. Text that will be shown along with the gift; 0-128 characters
 * - _string_ `$text_parse_mode` __Required: Optional__. Mode for parsing entities in the text. See formatting options for more details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 * - _MessageEntity[]_ `$text_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 *
 *
 * @method PromiseInterface|true giftPremiumSubscription(...$parameters) Gifts a Telegram Premium subscription to the given user. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#giftpremiumsubscription}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user who will receive a Telegram Premium subscription
 * - _int_ `$month_count` __Required: Yes__. Number of months the Telegram Premium subscription will be active for the user; must be one of 3, 6, or 12
 * - _int_ `$star_count` __Required: Yes__. Number of Telegram Stars to pay for the Telegram Premium subscription; must be 1000 for 3 months, 1500 for 6 months, and 2500 for 12 months
 * - _string_ `$text` __Required: Optional__. Text that will be shown along with the service message about the subscription; 0-128 characters
 * - _string_ `$text_parse_mode` __Required: Optional__. Mode for parsing entities in the text. See formatting options for more details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 * - _MessageEntity[]_ `$text_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 *
 *
 * @method PromiseInterface|true verifyUser(...$parameters) Verifies a user on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#verifyuser}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _string_ `$custom_description` __Required: Optional__. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 *
 *
 * @method PromiseInterface|true verifyChat(...$parameters) Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#verifychat}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$custom_description` __Required: Optional__. Custom description for the verification; 0-70 characters. Must be empty if the organization isn't allowed to provide a custom verification description.
 *
 *
 * @method PromiseInterface|true removeUserVerification(...$parameters) Removes verification from a user who is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#removeuserverification}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 *
 *
 * @method PromiseInterface|true removeChatVerification(...$parameters) Removes verification from a chat that is currently verified on behalf of the organization represented by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#removechatverification}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 *
 *
 * @method PromiseInterface|true readBusinessMessage(...$parameters) Marks incoming message as read on behalf of a business account. Requires the can_read_messages business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#readbusinessmessage}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection on behalf of which to read the message
 * - _int_ `$chat_id` __Required: Yes__. Unique identifier of the chat in which the message was received. The chat must have been active in the last 24 hours.
 * - _int_ `$message_id` __Required: Yes__. Unique identifier of the message to mark as read
 *
 *
 * @method PromiseInterface|true deleteBusinessMessages(...$parameters) Delete messages on behalf of a business account. Requires the can_delete_sent_messages business bot right to delete messages sent by the bot itself, or the can_delete_all_messages business bot right to delete any message. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletebusinessmessages}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection on behalf of which to delete the messages
 * - _int[]_ `$message_ids` __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages to delete. All messages must be from the same chat. See deleteMessage for limitations on which messages can be deleted
 *
 *
 * @method PromiseInterface|true setBusinessAccountName(...$parameters) Changes the first and last name of a managed business account. Requires the can_change_name business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setbusinessaccountname}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$first_name` __Required: Yes__. The new value of the first name for the business account; 1-64 characters
 * - _string_ `$last_name` __Required: Optional__. The new value of the last name for the business account; 0-64 characters
 *
 *
 * @method PromiseInterface|true setBusinessAccountUsername(...$parameters) Changes the username of a managed business account. Requires the can_change_username business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setbusinessaccountusername}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$username` __Required: Optional__. The new value of the username for the business account; 0-32 characters
 *
 *
 * @method PromiseInterface|true setBusinessAccountBio(...$parameters) Changes the bio of a managed business account. Requires the can_change_bio business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setbusinessaccountbio}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$bio` __Required: Optional__. The new value of the bio for the business account; 0-140 characters
 *
 *
 * @method PromiseInterface|true setBusinessAccountProfilePhoto(...$parameters) Changes the profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setbusinessaccountprofilephoto}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _InputProfilePhoto_ `$photo` __Required: Yes__. The new profile photo to set
 * - _bool_ `$is_public` __Required: Optional__. Pass True to set the public photo, which will be visible even if the main photo is hidden by the business account's privacy settings. An account can have only one public photo.
 *
 *
 * @method PromiseInterface|true removeBusinessAccountProfilePhoto(...$parameters) Removes the current profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#removebusinessaccountprofilephoto}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _bool_ `$is_public` __Required: Optional__. Pass True to remove the public photo, which is visible even if the main photo is hidden by the business account's privacy settings. After the main photo is removed, the previous profile photo (if present) becomes the main photo.
 *
 *
 * @method PromiseInterface|true setBusinessAccountGiftSettings(...$parameters) Changes the privacy settings pertaining to incoming gifts in a managed business account. Requires the can_change_gift_settings business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setbusinessaccountgiftsettings}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _bool_ `$show_gift_button` __Required: Yes__. Pass True, if a button for sending a gift to the user or by the business account must always be shown in the input field
 * - _AcceptedGiftTypes_ `$accepted_gift_types` __Required: Yes__. Types of gifts accepted by the business account
 *
 *
 * @method PromiseInterface|Telegram|Stars getBusinessAccountStarBalance(...$parameters) Returns the amount of Telegram Stars owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns StarAmount on success.
 *
 * {@see https://core.telegram.org/bots/api#getbusinessaccountstarbalance}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 *
 *
 * @method PromiseInterface|true transferBusinessAccountStars(...$parameters) Transfers Telegram Stars from the business account balance to the bot's balance. Requires the can_transfer_stars business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#transferbusinessaccountstars}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _int_ `$star_count` __Required: Yes__. Number of Telegram Stars to transfer; 1-10000
 *
 *
 * @method PromiseInterface getBusinessAccountGifts(...$parameters) Returns the gifts received and owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns OwnedGifts on success.
 *
 * {@see https://core.telegram.org/bots/api#getbusinessaccountgifts}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _bool_ `$exclude_unsaved` __Required: Optional__. Pass True to exclude gifts that aren't saved to the account's profile page
 * - _bool_ `$exclude_saved` __Required: Optional__. Pass True to exclude gifts that are saved to the account's profile page
 * - _bool_ `$exclude_unlimited` __Required: Optional__. Pass True to exclude gifts that can be purchased an unlimited number of times
 * - _bool_ `$exclude_limited` __Required: Optional__. Pass True to exclude gifts that can be purchased a limited number of times
 * - _bool_ `$exclude_unique` __Required: Optional__. Pass True to exclude unique gifts
 * - _bool_ `$sort_by_price` __Required: Optional__. Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
 * - _string_ `$offset` __Required: Optional__. Offset of the first entry to return as received from the previous request; use empty string to get the first chunk of results
 * - _int_ `$limit` __Required: Optional__. The maximum number of gifts to be returned; 1-100. Defaults to 100
 *
 *
 * @method PromiseInterface|true convertGiftToStars(...$parameters) Converts a given regular gift to Telegram Stars. Requires the can_convert_gifts_to_stars business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#convertgifttostars}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$owned_gift_id` __Required: Yes__. Unique identifier of the regular gift that should be converted to Telegram Stars
 *
 *
 * @method PromiseInterface|true upgradeGift(...$parameters) Upgrades a given regular gift to a unique gift. Requires the can_transfer_and_upgrade_gifts business bot right. Additionally requires the can_transfer_stars business bot right if the upgrade is paid. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#upgradegift}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$owned_gift_id` __Required: Yes__. Unique identifier of the regular gift that should be upgraded to a unique one
 * - _bool_ `$keep_original_details` __Required: Optional__. Pass True to keep the original gift text, sender and receiver in the upgraded gift
 * - _int_ `$star_count` __Required: Optional__. The amount of Telegram Stars that will be paid for the upgrade from the business account balance. If gift.prepaid_upgrade_star_count > 0, then pass 0, otherwise, the can_transfer_stars business bot right is required and gift.upgrade_star_count must be passed.
 *
 *
 * @method PromiseInterface|true transferGift(...$parameters) Transfers an owned unique gift to another user. Requires the can_transfer_and_upgrade_gifts business bot right. Requires can_transfer_stars business bot right if the transfer is paid. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#transfergift}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _string_ `$owned_gift_id` __Required: Yes__. Unique identifier of the regular gift that should be transferred
 * - _int_ `$new_owner_chat_id` __Required: Yes__. Unique identifier of the chat which will own the gift. The chat must be active in the last 24 hours.
 * - _int_ `$star_count` __Required: Optional__. The amount of Telegram Stars that will be paid for the transfer from the business account balance. If positive, then the can_transfer_stars business bot right is required.
 *
 *
 * @method PromiseInterface|Story postStory(...$parameters) Posts a story on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
 *
 * {@see https://core.telegram.org/bots/api#poststory}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _InputStoryContent_ `$content` __Required: Yes__. Content of the story
 * - _int_ `$active_period` __Required: Yes__. Period after which the story is moved to the archive, in seconds; must be one of 6 * 3600, 12 * 3600, 86400, or 2 * 86400
 * - _string_ `$caption` __Required: Optional__. Caption of the story, 0-2048 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the story caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _StoryArea[]_ `$areas` __Required: Optional__. A JSON-serialized list of clickable areas to be shown on the story
 * - _bool_ `$post_to_chat_page` __Required: Optional__. Pass True to keep the story accessible after it expires
 * - _bool_ `$protect_content` __Required: Optional__. Pass True if the content of the story must be protected from forwarding and screenshotting
 *
 *
 * @method PromiseInterface|Story editStory(...$parameters) Edits a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
 *
 * {@see https://core.telegram.org/bots/api#editstory}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _int_ `$story_id` __Required: Yes__. Unique identifier of the story to edit
 * - _InputStoryContent_ `$content` __Required: Yes__. Content of the story
 * - _string_ `$caption` __Required: Optional__. Caption of the story, 0-2048 characters after entities parsing
 * - _string_ `$parse_mode` __Required: Optional__. Mode for parsing entities in the story caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities` __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _StoryArea[]_ `$areas` __Required: Optional__. A JSON-serialized list of clickable areas to be shown on the story
 *
 *
 * @method PromiseInterface|true deleteStory(...$parameters) Deletes a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletestory}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Yes__. Unique identifier of the business connection
 * - _int_ `$story_id` __Required: Yes__. Unique identifier of the story to delete
 *
 *
 * @method PromiseInterface|Message sendSticker(...$parameters) Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendsticker}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile|string_ `$sticker` __Required: Yes__. Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a .WEBP sticker from the Internet, or upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data. More information on Sending Files ». Video and animated stickers can't be sent via an HTTP URL.
 * - _string_ `$emoji` __Required: Optional__. Emoji associated with the sticker; only for just uploaded stickers
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply_ `$reply_markup` __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
 *
 *
 * @method PromiseInterface|StickerSet getStickerSet(...$parameters) Use this method to get a sticker set. On success, a StickerSet object is returned.
 *
 * {@see https://core.telegram.org/bots/api#getstickerset}
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Name of the sticker set
 *
 *
 * @method PromiseInterface|Sticker[] getCustomEmojiStickers(...$parameters) Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
 *
 * {@see https://core.telegram.org/bots/api#getcustomemojistickers}
 *
 * Parameters:
 * - _string[]_ `$custom_emoji_ids` __Required: Yes__. A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
 *
 *
 * @method PromiseInterface|File uploadStickerFile(...$parameters) Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success.
 *
 * {@see https://core.telegram.org/bots/api#uploadstickerfile}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier of sticker file owner
 * - _InputFile_ `$sticker` __Required: Yes__. A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers for technical requirements. More information on Sending Files »
 * - _string_ `$sticker_format` __Required: Yes__. Format of the sticker, must be one of “static”, “animated”, “video”
 *
 *
 * @method PromiseInterface|true createNewStickerSet(...$parameters) Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#createnewstickerset}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier of created sticker set owner
 * - _string_ `$name` __Required: Yes__. Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
 * - _string_ `$title` __Required: Yes__. Sticker set title, 1-64 characters
 * - _InputSticker[]_ `$stickers` __Required: Yes__. A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
 * - _string_ `$sticker_type` __Required: Optional__. Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular sticker set is created.
 * - _bool_ `$needs_repainting` __Required: Optional__. Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji sticker sets only
 *
 *
 * @method PromiseInterface|true addStickerToSet(...$parameters) Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#addstickertoset}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier of sticker set owner
 * - _string_ `$name` __Required: Yes__. Sticker set name
 * - _InputSticker_ `$sticker` __Required: Yes__. A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set isn't changed.
 *
 *
 * @method PromiseInterface|true setStickerPositionInSet(...$parameters) Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickerpositioninset}
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 * - _int_ `$position` __Required: Yes__. New sticker position in the set, zero-based
 *
 *
 * @method PromiseInterface|true deleteStickerFromSet(...$parameters) Use this method to delete a sticker from a set created by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletestickerfromset}
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 *
 *
 * @method PromiseInterface|true replaceStickerInSet(...$parameters) Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#replacestickerinset}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier of the sticker set owner
 * - _string_ `$name` __Required: Yes__. Sticker set name
 * - _string_ `$old_sticker` __Required: Yes__. File identifier of the replaced sticker
 * - _InputSticker_ `$sticker` __Required: Yes__. A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set remains unchanged.
 *
 *
 * @method PromiseInterface|true setStickerEmojiList(...$parameters) Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickeremojilist}
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 * - _string[]_ `$emoji_list` __Required: Yes__. A JSON-serialized list of 1-20 emoji associated with the sticker
 *
 *
 * @method PromiseInterface|true setStickerKeywords(...$parameters) Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickerkeywords}
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 * - _string[]_ `$keywords` __Required: Optional__. A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
 *
 *
 * @method PromiseInterface|true setStickerMaskPosition(...$parameters) Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickermaskposition}
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 * - _MaskPosition_ `$mask_position` __Required: Optional__. A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to remove the mask position.
 *
 *
 * @method PromiseInterface|true setStickerSetTitle(...$parameters) Use this method to set the title of a created sticker set. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickersettitle}
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Sticker set name
 * - _string_ `$title` __Required: Yes__. Sticker set title, 1-64 characters
 *
 *
 * @method PromiseInterface|true setStickerSetThumbnail(...$parameters) Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setstickersetthumbnail}
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Sticker set name
 * - _int_ `$user_id` __Required: Yes__. User identifier of the sticker set owner
 * - _InputFile|string_ `$thumbnail` __Required: Optional__. A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and have a width and height of exactly 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see https://core.telegram.org/stickers#animation-requirements for animated sticker technical requirements), or a .WEBM video with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
 * - _string_ `$format` __Required: Yes__. Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated” for a .TGS animation, or “video” for a .WEBM video
 *
 *
 * @method PromiseInterface|true setCustomEmojiStickerSetThumbnail(...$parameters) Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail}
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Sticker set name
 * - _string_ `$custom_emoji_id` __Required: Optional__. Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the first sticker as the thumbnail.
 *
 *
 * @method PromiseInterface|true deleteStickerSet(...$parameters) Use this method to delete a sticker set that was created by the bot. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#deletestickerset}
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Sticker set name
 *
 *
 * @method PromiseInterface|true answerInlineQuery(...$parameters) Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
 *
 * {@see https://core.telegram.org/bots/api#answerinlinequery}
 *
 * Parameters:
 * - _string_ `$inline_query_id` __Required: Yes__. Unique identifier for the answered query
 * - _InlineQueryResult[]_ `$results` __Required: Yes__. A JSON-serialized array of results for the inline query
 * - _int_ `$cache_time` __Required: Optional__. The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
 * - _bool_ `$is_personal` __Required: Optional__. Pass True if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query.
 * - _string_ `$next_offset` __Required: Optional__. Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
 * - _InlineQueryResultsButton_ `$button` __Required: Optional__. A JSON-serialized object describing a button to be shown above inline query results
 *
 *
 * @method PromiseInterface|SentWebAppMessage answerWebAppQuery(...$parameters) Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
 *
 * {@see https://core.telegram.org/bots/api#answerwebappquery}
 *
 * Parameters:
 * - _string_ `$web_app_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _InlineQueryResult_ `$result` __Required: Yes__. A JSON-serialized object describing the message to be sent
 *
 *
 * @method PromiseInterface|PreparedInlineMessage savePreparedInlineMessage(...$parameters) Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object.
 *
 * {@see https://core.telegram.org/bots/api#savepreparedinlinemessage}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user that can use the prepared message
 * - _InlineQueryResult_ `$result` __Required: Yes__. A JSON-serialized object describing the message to be sent
 * - _bool_ `$allow_user_chats` __Required: Optional__. Pass True if the message can be sent to private chats with users
 * - _bool_ `$allow_bot_chats` __Required: Optional__. Pass True if the message can be sent to private chats with bots
 * - _bool_ `$allow_group_chats` __Required: Optional__. Pass True if the message can be sent to group and supergroup chats
 * - _bool_ `$allow_channel_chats` __Required: Optional__. Pass True if the message can be sent to channel chats
 *
 *
 * @method PromiseInterface|Message sendInvoice(...$parameters) Use this method to send invoices. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendinvoice}
 *
 * Parameters:
 * - _int|string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$title` __Required: Yes__. Product name, 1-32 characters
 * - _string_ `$description` __Required: Yes__. Product description, 1-255 characters
 * - _string_ `$payload` __Required: Yes__. Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * - _string_ `$provider_token` __Required: Optional__. Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
 * - _string_ `$currency` __Required: Yes__. Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
 * - _LabeledPrice[]_ `$prices` __Required: Yes__. Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
 * - _int_ `$max_tip_amount` __Required: Optional__. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
 * - _int[]_ `$suggested_tip_amounts` __Required: Optional__. A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * - _string_ `$start_parameter` __Required: Optional__. Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
 * - _string_ `$provider_data` __Required: Optional__. JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * - _string_ `$photo_url` __Required: Optional__. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
 * - _int_ `$photo_size` __Required: Optional__. Photo size in bytes
 * - _int_ `$photo_width` __Required: Optional__. Photo width
 * - _int_ `$photo_height` __Required: Optional__. Photo height
 * - _bool_ `$need_name` __Required: Optional__. Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_phone_number` __Required: Optional__. Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_email` __Required: Optional__. Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_shipping_address` __Required: Optional__. Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$send_phone_number_to_provider` __Required: Optional__. Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
 * - _bool_ `$send_email_to_provider` __Required: Optional__. Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
 * - _bool_ `$is_flexible` __Required: Optional__. Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
 *
 *
 * @method PromiseInterface|string createInvoiceLink(...$parameters) Use this method to create a link for an invoice. Returns the created invoice link as String on success.
 *
 * {@see https://core.telegram.org/bots/api#createinvoicelink}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the link will be created. For payments in Telegram Stars only.
 * - _string_ `$title` __Required: Yes__. Product name, 1-32 characters
 * - _string_ `$description` __Required: Yes__. Product description, 1-255 characters
 * - _string_ `$payload` __Required: Yes__. Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal processes.
 * - _string_ `$provider_token` __Required: Optional__. Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
 * - _string_ `$currency` __Required: Yes__. Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
 * - _LabeledPrice[]_ `$prices` __Required: Yes__. Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
 * - _int_ `$subscription_period` __Required: Optional__. The number of seconds the subscription will be active for before the next payment. The currency must be set to “XTR” (Telegram Stars) if the parameter is used. Currently, it must always be 2592000 (30 days) if specified. Any number of subscriptions can be active for a given bot at the same time, including multiple concurrent subscriptions from the same user. Subscription price must no exceed 10000 Telegram Stars.
 * - _int_ `$max_tip_amount` __Required: Optional__. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
 * - _int[]_ `$suggested_tip_amounts` __Required: Optional__. A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * - _string_ `$provider_data` __Required: Optional__. JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * - _string_ `$photo_url` __Required: Optional__. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * - _int_ `$photo_size` __Required: Optional__. Photo size in bytes
 * - _int_ `$photo_width` __Required: Optional__. Photo width
 * - _int_ `$photo_height` __Required: Optional__. Photo height
 * - _bool_ `$need_name` __Required: Optional__. Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_phone_number` __Required: Optional__. Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_email` __Required: Optional__. Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$need_shipping_address` __Required: Optional__. Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
 * - _bool_ `$send_phone_number_to_provider` __Required: Optional__. Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
 * - _bool_ `$send_email_to_provider` __Required: Optional__. Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
 * - _bool_ `$is_flexible` __Required: Optional__. Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
 *
 *
 * @method PromiseInterface|true answerShippingQuery(...$parameters) If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 *
 * {@see https://core.telegram.org/bots/api#answershippingquery}
 *
 * Parameters:
 * - _string_ `$shipping_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _bool_ `$ok` __Required: Yes__. Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
 * - _ShippingOption[]_ `$shipping_options` __Required: Optional__. Required if ok is True. A JSON-serialized array of available shipping options.
 * - _string_ `$error_message` __Required: Optional__. Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. “Sorry, delivery to your desired address is unavailable”). Telegram will display this message to the user.
 *
 *
 * @method PromiseInterface|true answerPreCheckoutQuery(...$parameters) Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 *
 * {@see https://core.telegram.org/bots/api#answerprecheckoutquery}
 *
 * Parameters:
 * - _string_ `$pre_checkout_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _bool_ `$ok` __Required: Yes__. Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
 * - _string_ `$error_message` __Required: Optional__. Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
 *
 *
 * @method PromiseInterface|StarAmount getMyStarBalance(...$parameters) A method to get the current Telegram Stars balance of the bot. Requires no parameters. On success, returns a StarAmount object.
 *
 * {@see https://core.telegram.org/bots/api#getmystarbalance}
 * @method PromiseInterface|StarTransactions getStarTransactions(...$parameters) Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
 *
 * {@see https://core.telegram.org/bots/api#getstartransactions}
 *
 * Parameters:
 * - _int_ `$offset` __Required: Optional__. Number of transactions to skip in the response
 * - _int_ `$limit` __Required: Optional__. The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 *
 *
 * @method PromiseInterface|true refundStarPayment(...$parameters) Refunds a successful payment in Telegram Stars. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#refundstarpayment}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Identifier of the user whose payment will be refunded
 * - _string_ `$telegram_payment_charge_id` __Required: Yes__. Telegram payment identifier
 *
 *
 * @method PromiseInterface|true editUserStarSubscription(...$parameters) Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on success.
 *
 * {@see https://core.telegram.org/bots/api#edituserstarsubscription}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Identifier of the user whose subscription will be edited
 * - _string_ `$telegram_payment_charge_id` __Required: Yes__. Telegram payment identifier for the subscription
 * - _bool_ `$is_canceled` __Required: Yes__. Pass True to cancel extension of the user subscription; the subscription must be active up to the end of the current subscription period. Pass False to allow the user to re-enable a subscription that was previously canceled by the bot.
 *
 *
 * @method PromiseInterface|true setPassportDataErrors(...$parameters) Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
 *
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * {@see https://core.telegram.org/bots/api#setpassportdataerrors}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier
 * - _PassportElementError[]_ `$errors` __Required: Yes__. A JSON-serialized array describing the errors
 *
 *
 * @method PromiseInterface|Message sendGame(...$parameters) Use this method to send a game. On success, the sent Message is returned.
 *
 * {@see https://core.telegram.org/bots/api#sendgame}
 *
 * Parameters:
 * - _string_ `$business_connection_id` __Required: Optional__. Unique identifier of the business connection on behalf of which the message will be sent
 * - _int_ `$chat_id` __Required: Yes__. Unique identifier for the target chat
 * - _int_ `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$game_short_name` __Required: Yes__. Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
 * - _bool_ `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_ `$protect_content` __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _bool_ `$allow_paid_broadcast` __Required: Optional__. Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
 * - _string_ `$message_effect_id` __Required: Optional__. Unique identifier of the message effect to be added to the message; for private chats only
 * - _ReplyParameters_ `$reply_parameters` __Required: Optional__. Description of the message to reply to
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
 *
 *
 * @method PromiseInterface|Message|true setGameScore(...$parameters) Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 *
 * {@see https://core.telegram.org/bots/api#setgamescore}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. User identifier
 * - _int_ `$score` __Required: Yes__. New score, must be non-negative
 * - _bool_ `$force` __Required: Optional__. Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
 * - _bool_ `$disable_edit_message` __Required: Optional__. Pass True if the game message should not be automatically edited to include the current scoreboard
 * - _int_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 *
 *
 * @method PromiseInterface|GameHighScore[] getGameHighScores(...$parameters) Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
 *
 * {@see https://core.telegram.org/bots/api#getgamehighscores}
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Target user id
 * - _int_ `$chat_id` __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * - _int_ `$message_id` __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 *
 *
 * @see https://core.telegram.org/bots/api
 */
trait HasTelegramMethods
{
    /**
     * @return class-string<TelegramMethod>|null
     */
    private function method(string $method): ?string
    {
        if (class_exists($class = "WeStacks\\TeleBot\\Methods\\{$this->studly($method)}Method")) {
            return $class;
        }
        return null;
    }

    private function studly(string $value): string
    {
        $words = explode(" ", str_replace(["-", "_"], " ", $value));
        $studlyWords = array_map(fn ($word) => ucfirst($word), $words);
        return implode($studlyWords);
    }
}
