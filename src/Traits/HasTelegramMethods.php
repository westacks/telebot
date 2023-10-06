<?php

namespace WeStacks\TeleBot\Traits;

use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\BotDescription;
use WeStacks\TeleBot\Objects\BotName;
use WeStacks\TeleBot\Objects\BotShortDescription;
use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\ChatAdministratorRights;
use WeStacks\TeleBot\Objects\ChatInviteLink;
use WeStacks\TeleBot\Objects\ChatMember;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\ForumTopic;
use WeStacks\TeleBot\Objects\GameHighScore;
use WeStacks\TeleBot\Objects\MenuButton;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Objects\MessageId;
use WeStacks\TeleBot\Objects\SentWebAppMessage;
use WeStacks\TeleBot\Objects\Sticker;
use WeStacks\TeleBot\Objects\StickerSet;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\UserProfilePhotos;
use WeStacks\TeleBot\Objects\WebhookInfo;

/**
 * This trait contains documentation for all Telegram methods.
 *
 * @method File|bool|PromiseInterface addStickerToSet(array $parameters = []) Use this method to add a new sticker to a set created by the bot. The format of the added sticker must match the format of the other stickers in the set. Emoji sticker sets can have up to 200 stickers. Animated and video sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
 *
 * Parameters:
 * - _int_          `$user_id`       __Required: Yes__. User identifier of sticker set owner
 * - _string_       `$name`          __Required: Yes__. Sticker set name
 * - _InputSticker_ `$sticker`       __Required: Yes__. A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set isn't changed.
 * @method bool|PromiseInterface answerCallbackQuery(array $parameters = []) Use this method to send answers to callback queries sent from [inline keyboards](/bots#inline-keyboards-and-on-the-fly-updating). The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 *
 * > Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a game for your bot via [@Botfather](https://t.me/botfather) and accept the terms. Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 *
 * Parameters:
 * - _string_ `$callback_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _string_ `$text`              __Required: Optional__. Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
 * - _bool_   `$show_alert`        __Required: Optional__. If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
 * - _string_ `$url`               __Required: Optional__. URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @Botfather, specify the URL that opens your game — note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
 * - _int_    `$cache_time`        __Required: Optional__. The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
 * @method bool|PromiseInterface answerInlineQuery(array $parameters = []) Use this method to send answers to an inline query. On success, True is returned.
 *
 * No more than 50 results per query are allowed.
 *
 * Parameters:
 * - _string_                   `$inline_query_id`     __Required: Yes__. Unique identifier for the answered query
 * - _InlineQueryResult[]_      `$results`             __Required: Yes__. A JSON-serialized array of results for the inline query
 * - _int_                      `$cache_time`          __Required: Optional__. The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
 * - _bool_                     `$is_personal`         __Required: Optional__. Pass True, if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query
 * - _string_                   `$next_offset`         __Required: Optional__. Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
 * - _InlineQueryResultsButton_ `$button`              __Required: Optional__. A JSON-serialized object describing a button to be shown above inline query results
 * @method bool|PromiseInterface answerPreCheckoutQuery(array $parameters = []) Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an [Update](https://core.telegram.org/bots/api#update) with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 *
 * Parameters:
 * - _string_ `$pre_checkout_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _bool_   `$ok`                    __Required: Yes__. Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
 * - _string_ `$error_message`         __Required: Optional__. Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
 * @method bool|PromiseInterface answerShippingQuery(array $parameters = []) If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an [Update](https://core.telegram.org/bots/api#update) with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 *
 * Parameters:
 * - _string_           `$shipping_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _bool_             `$ok`                __Required: Yes__. Specify True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
 * - _ShippingOption[]_ `$shipping_options`  __Required: Optional__. Required if ok is True. A JSON-serialized array of available shipping options.
 * - _string_           `$error_message`     __Required: Optional__. Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the user.
 * @method SentWebAppMessage|PromiseInterface answerWebAppQuery(array $parameters = []) Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
 *
 * Parameters:
 * - _string_            `$web_app_query_id` __Required: Yes__. Unique identifier for the query to be answered
 * - _InlineQueryResult_ `$result`           __Required: Yes__. A JSON-serialized object describing the message to be sent
 * @method bool|PromiseInterface approveChatJoinRequest(array $parameters = []) Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$user_id` __Required: Yes__. Unique identifier of the target user
 * @method bool|PromiseInterface banChatMember(array $parameters = []) Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless [unbanned](https://core.telegram.org/bots/api#unbanchatmember) first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`         __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
 * - _int_    `$user_id`         __Required: Yes__. Unique identifier of the target user
 * - _int_    `$until_date`      __Required: Optional__. Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
 * - _bool_   `$revoke_messages` __Required: Optional__. Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
 * @method bool|PromiseInterface banChatSenderChat(array $parameters = []) Use this method to ban a channel chat in a supergroup or a channel. Until the chat is [unbanned](https://core.telegram.org/bots/api#unbanchatsenderchat), the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`        __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$sender_chat_id` __Required: Yes__. Unique identifier of the target sender chat
 * @method bool|PromiseInterface close() Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
 * @method MessageId|PromiseInterface copyMessage(array $parameters = []) Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. The method is analogous to the method [forwardMessage](https://core.telegram.org/bots/api#forwardmessage), but the copied message doesn't have a link to the original message. Returns the [MessageId](https://core.telegram.org/bots/api#messageid) of the sent message on success.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_          `$from_chat_id`                __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * - _int_             `$message_id`                  __Required: Yes__. Message identifier in the chat specified in from_chat_id
 * - _string_          `$caption`                     __Required: Optional__. New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the new caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method ChatInviteLink|PromiseInterface createChatInviteLink(array $parameters = []) Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method [revokeChatInviteLink](https://core.telegram.org/bots/api#revokechatinvitelink). Returns the new invite link as [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * Parameters:
 * - _string_ `$chat_id`              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$name`                 __Required: Optional__. Invite link name; 0-32 characters
 * - _int_    `$expire_date`          __Required: Optional__. Point in time (Unix timestamp) when the link will expire
 * - _int_    `$member_limit`         __Required: Optional__. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * - _bool_   `$creates_join_request` __Required: Optional__. True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
 * @method ChatInviteLink|PromiseInterface createInvoiceLink(array $parameters = []) Use this method to create a link for an invoice. Returns the created invoice link as String on success.
 *
 * Parameters:
 * - _string_          `$title`                         __Required: Yes__.	Product name, 1-32 characters
 * - _string_          `$description`                   __Required: Yes__.	Product description, 1-255 characters
 * - _string_          `$payload`                       __Required: Yes__.	Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * - _string_          `$provider_token`                __Required: Yes__.	Payment provider token, obtained via BotFather
 * - _string_          `$currency`                      __Required: Yes__.	Three-letter ISO 4217 currency code, see more on currencies
 * - _LabeledPrice[]_  `$prices`                        __Required: Yes__.	Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * - _integer_         `$max_tip_amount`                __Required: Optional__.	The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount
 * - _integer_         `$suggested_tip_amounts`	        __Required: Optional__.	A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specifie
 * - _string_          `$provider_data`                 __Required: Optional__.	JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment pro
 * - _string_          `$photo_url`                     __Required: Optional__.	URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
 * - _integer_         `$photo_size`                    __Required: Optional__.	Photo size in bytes
 * - _integer_         `$photo_width`                   __Required: Optional__.	Photo width
 * - _integer_         `$photo_height`                  __Required: Optional__.	Photo height
 * - _boolean_         `$need_name`                     __Required: Optional__.	Pass True, if you require the user's full name to complete the order
 * - _boolean_         `$need_phone_number`             __Required: Optional__.	Pass True, if you require the user's phone number to complete the order
 * - _boolean_         `$need_email`                    __Required: Optional__.	Pass True, if you require the user's email address to complete the order
 * - _boolean_         `$need_shipping_address`         __Required: Optional__.	Pass True, if you require the user's shipping address to complete the order
 * - _boolean_         `$send_phone_number_to_provider` __Required: Optional__.	Pass True, if the user's phone number should be sent to the provider
 * - _boolean_         `$send_email_to_provider`        __Required: Optional__.	Pass True, if the user's email address should be sent to the provider
 * - _boolean_         `$is_flexible`                   __Required: Optional__.	Pass True, if the final price depends on the shipping method
 * @method File|PromiseInterface createNewStickerSet(array $parameters = []) Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
 *
 * Parameters:
 * - _int_            `$user_id`          __Required: Yes__. User identifier of created sticker set owner
 * - _string_         `$name`             __Required: Yes__. Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only english letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in “_by_”.  is case insensitive. 1-64 characters.
 * - _string_         `$title`            __Required: Yes__. Sticker set title, 1-64 characters
 * - _InputSticker[]_ `$stickers`         __Required: Yes__. A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
 * - _string_         `$sticker_format`   __Required: Yes__. Format of stickers in the set, must be one of “static”, “animated”, “video”
 * - _string_         `$sticker_type`     __Required: Optional__. Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular sticker set is created.
 * - _true_           `$needs_repainting` __Required: Optional__. Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji sticker sets only
 * @method bool|PromiseInterface declineChatJoinRequest(array $parameters = []) Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$user_id` __Required: Yes__. Unique identifier of the target user
 * @method bool|PromiseInterface deleteChatPhoto(array $parameters = []) Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @method bool|PromiseInterface deleteChatStickerSet(array $parameters = []) Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method Sticker[]|PromiseInterface getForumTopicIconStickers() Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
 * @method ForumTopic|PromiseInterface createForumTopic(array $parameters = []) Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __string__ `$name`                  __Required: Yes__. Topic name, 1-128 characters
 * - __int__    `$icon_color`            __Required: Optional__. Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
 * - __string__ `$icon_custom_emoji_id`  __Required: Optional__. Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
 * @method bool|PromiseInterface editForumTopic(array $parameters = []) Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * - __string__ `$name`                  __Required: Yes__. New topic name, 1-128 characters
 * - __string__ `$icon_custom_emoji_id`  __Required: Optional__. New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
 * @method bool|PromiseInterface closeForumTopic(array $parameters = []) Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * @method bool|PromiseInterface reopenForumTopic(array $parameters = []) Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * @method bool|PromiseInterface deleteForumTopic(array $parameters = []) Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * @method bool|PromiseInterface unpinAllForumTopicMessages(array $parameters = []) Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * @method bool|PromiseInterface editGeneralForumTopic(array $parameters = []) Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __int__    `$message_thread_id`     __Required: Yes__. Unique identifier for the target message thread of the forum topi
 * @method bool|PromiseInterface editGeneralForumTopic(array $parameters = []) Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - __string__    `$name`               __Required: Yes__. New topic name, 1-128 characters
 * @method bool|PromiseInterface closeGeneralForumTopic(array $parameters = []) Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method bool|PromiseInterface reopenGeneralForumTopic(array $parameters = []) Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method bool|PromiseInterface hideGeneralForumTopic(array $parameters = []) Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method bool|PromiseInterface unhideGeneralForumTopic(array $parameters = []) Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method bool|PromiseInterface unpinAllGeneralForumTopicMessages(array $parameters = []) Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
 *
 * Parameters:
 * - __string__ `$chat_id`               __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @method bool|PromiseInterface deleteMessage(array $parameters = []) Use this method to delete a message, including service messages, with the following limitations:
 *                                                                     - A message can only be deleted if it was sent less than 48 hours ago.
 *                                                                     - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
 *                                                                     - Bots can delete outgoing messages in private chats, groups, and supergroups.
 *                                                                     - Bots can delete incoming messages in private chats.
 *                                                                     - Bots granted can_post_messages permissions can delete outgoing messages in channels.
 *                                                                     - If the bot is an administrator of a group, it can delete any message there.
 *                                                                     - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
 *
 * Returns True on success.
 *
 * Parameters:
 * - _int_ `$chat_id`    __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_ `$message_id` __Required: Yes__. Identifier of the message to delete
 * @method bool|PromiseInterface deleteMyCommands(array $parameters = []) Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, [higher level commands](https://core.telegram.org/bots/api#determining-list-of-commands) will be shown to affected users. Returns True on success.
 *
 * Parameters:
 * - _BotCommandScope_ `$scope`         __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * - _string_          `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 * @method bool|PromiseInterface deleteStickerFromSet(array $parameters = []) Use this method to delete a sticker from a set created by the bot. Returns True on success.
 *
 * Parameters:
 * - _string_ `$sticker` __Required: Yes__. File identifier of the sticker
 * @method bool|PromiseInterface deleteWebhook(array $parameters = []) Use this method to remove webhook integration if you decide to switch back to [getUpdates](https://core.telegram.org/bots/api#getupdates). Returns True on success.
 *
 * Parameters:
 * - _bool_ `$drop_pending_updates` __Required: Optional__. Pass True to drop all pending updates
 * @method ChatInviteLink|PromiseInterface editChatInviteLink(array $parameters = []) Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * Parameters:
 * - _string_ `$chat_id`              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$invite_link`          __Required: Yes__. The invite link to edit
 * - _string_ `$name`                 __Required: Optional__. Invite link name; 0-32 characters
 * - _int_    `$expire_date`          __Required: Optional__. Point in time (Unix timestamp) when the link will expire
 * - _int_    `$member_limit`         __Required: Optional__. Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
 * - _bool_   `$creates_join_request` __Required: Optional__. True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
 * @method Message|bool|PromiseInterface editMessageCaption(array $parameters = []) Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_               `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _string_               `$caption`           __Required: Optional__. New caption of the message, 0-1024 characters after entities parsing
 * - _string_               `$parse_mode`        __Required: Optional__. Mode for parsing entities in the message caption. See formatting options for more details.
 * - _MessageEntity[]_      `$caption_entities`  __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _InlineKeyboardMarkup_ `$reply_markup`      __Required: Optional__. A JSON-serialized object for an inline keyboard.
 * @method Message|bool|PromiseInterface editMessageLiveLocation(array $parameters = []) Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to [stopMessageLiveLocation](https://core.telegram.org/bots/api#stopmessagelivelocation). On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`                __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`             __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_               `$inline_message_id`      __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _float_                `$latitude`               __Required: Yes__. Latitude of new location
 * - _float_                `$longitude`              __Required: Yes__. Longitude of new location
 * - _float_                `$horizontal_accuracy`    __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * - _int_                  `$heading`                __Required: Optional__. Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * - _int_                  `$proximity_alert_radius` __Required: Optional__. Maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * - _InlineKeyboardMarkup_ `$reply_markup`           __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 * @method Message|bool|PromiseInterface editMessageMedia(array $parameters = []) Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_               `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InputMedia_           `$media`             __Required: Yes__. A JSON-serialized object for a new media content of the message
 * - _InlineKeyboardMarkup_ `$reply_markup`      __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 * @method Message|bool|PromiseInterface editMessageReplyMarkup(array $parameters = []) Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_               `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InlineKeyboardMarkup_ `$reply_markup`      __Required: Optional__. A JSON-serialized object for an inline keyboard.
 * @method Message|bool|PromiseInterface editMessageText(array $parameters = []) Use this method to edit text and [game](https://core.telegram.org/bots/api#games) messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`                  __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`               __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * - _string_               `$inline_message_id`        __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _string_               `$text`                     __Required: Yes__. New text of the message, 1-4096 characters after entities parsing
 * - _string_               `$parse_mode`               __Required: Optional__. Mode for parsing entities in the message text. See formatting options for more details.
 * - _MessageEntity[]_      `$entities`                 __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * - _bool_                 `$disable_web_page_preview` __Required: Optional__. Disables link previews for links in this message
 * - _InlineKeyboardMarkup_ `$reply_markup`             __Required: Optional__. A JSON-serialized object for an inline keyboard.
 * @method string|PromiseInterface exportChatInviteLink(array $parameters = []) Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @method Message|PromiseInterface forwardMessage(array $parameters = []) Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_ `$chat_id`              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$message_thread_id`    __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_ `$from_chat_id`         __Required: Yes__. Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
 * - _bool_   `$disable_notification` __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_   `$protect_content`      __Required: Optional__. Protects the contents of the forwarded message from forwarding and saving
 * - _int_    `$message_id`           __Required: Yes__. Message identifier in the chat specified in from_chat_id
 * @method ChatMember[]|PromiseInterface getChatAdministrators(array $parameters = []) Use this method to get a list of administrators in a chat. On success, returns an Array of [ChatMember](https://core.telegram.org/bots/api#chatmember) objects that contains information about all chat administrators except other bots. If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @method int|PromiseInterface getChatMemberCount(array $parameters = []) Use this method to get the number of members in a chat. Returns Int on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @method ChatMember|PromiseInterface getChatMember(array $parameters = []) Use this method to get information about a member of a chat. Returns a [ChatMember](https://core.telegram.org/bots/api#chatmember) object on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * - _int_    `$user_id` __Required: Yes__. Unique identifier of the target user
 * @method MenuButton|PromiseInterface getChatMenuButton(array $parameters = []) Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
 * @method Chat|PromiseInterface getChat(array $parameters = []) Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a [Chat](https://core.telegram.org/bots/api#chat) object on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @method Sticker[]|PromiseInterface getCustomEmojiStickers(array $parameters = []) Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
 *
 * Parameters:
 * - _string[]_ `$custom_emoji_ids` __Required: Yes__. List of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
 * @method File|PromiseInterface getFile(array $parameters = []) Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a [File](https://core.telegram.org/bots/api#file) object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling [getFile](https://core.telegram.org/bots/api#getfile) again.
 *
 * Parameters:
 * - _string_ `$file_id` __Required: Yes__. File identifier to get info about
 * @method GameHighScore[]|PromiseInterface getGameHighScores(array $parameters = []) Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. On success, returns an Array of [GameHighScore](https://core.telegram.org/bots/api#gamehighscore) objects.
 *
 * This method will currently return scores for the target user, plus two of their closest neighbors on each side. Will also return the top three users if the user and his neighbors are not among them. Please note that this behavior is subject to change.
 *
 * Parameters:
 * - _int_    `$user_id`           __Required: Yes__. Target user id
 * - _int_    `$chat_id`           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * - _int_    `$message_id`        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * - _string_ `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @method User|PromiseInterface getMe() A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a [User](https://core.telegram.org/bots/api#user) object.
 * @method BotCommand[]|PromiseInterface getMyCommands(array $parameters = []) Use this method to get the current list of the bot's commands for the given scope and user language. Returns Array of [BotCommand](https://core.telegram.org/bots/api#botcommand) on success. If commands aren't set, an empty list is returned.
 *
 * Parameters:
 * - _BotCommandScope_ `$scope`         __Required: Optional__. A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
 * - _string_          `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 * @method ChatAdministratorRights|PromiseInterface getMyDefaultAdministratorRights(array $parameters = []) Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
 *
 * Parameters:
 * - _bool_ `$for_channels` __Required: Optional__. Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
 * @method StickerSet|PromiseInterface getStickerSet(array $parameters = []) Use this method to get a sticker set. On success, a [StickerSet](https://core.telegram.org/bots/api#stickerset) object is returned.
 *
 * Parameters:
 * - _string_ `$name` __Required: Yes__. Name of the sticker set
 * @method Update[]|PromiseInterface getUpdates(array $parameters = []) Use this method to receive incoming updates using long polling ([wiki](https://en.wikipedia.org/wiki/Push_technology#Long_polling)). An Array of [Update](https://core.telegram.org/bots/api#update) objects is returned.
 *
 * Parameters:
 * - _int_      `$offset`          __Required: Optional__. Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will forgotten.
 * - _int_      `$limit`           __Required: Optional__. Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 * - _int_      `$timeout`         __Required: Optional__. Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
 * - _string[]_ `$allowed_updates` __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time.
 * @method UserProfilePhotos|PromiseInterface getUserProfilePhotos(array $parameters = []) Use this method to get a list of profile pictures for a user. Returns a [UserProfilePhotos](https://core.telegram.org/bots/api#userprofilephotos) object.
 *
 * Parameters:
 * - _int_ `$user_id` __Required: Yes__. Unique identifier of the target user
 * - _int_ `$offset`  __Required: Optional__. Sequential number of the first photo to be returned. By default, all photos are returned.
 * - _int_ `$limit`   __Required: Optional__. Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 * @method WebhookInfo|PromiseInterface getWebhookInfo() Use this method to get current webhook status. Requires no parameters. On success, returns a [WebhookInfo](https://core.telegram.org/bots/api#webhookinfo) object. If the bot is using [getUpdates](https://core.telegram.org/bots/api#getupdates), will return an object with the url field empty.
 * @method BotDescription|PromiseInterface getMyDescription() Use this method to get the current bot description for the given user language. Returns [BotDescription](https://core.telegram.org/bots/api#botdescription) on success.
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 * @method BotName|PromiseInterface getMyName() Use this method to get the current bot name for the given user language. Returns [BotName](https://core.telegram.org/bots/api#botname) on success.
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 * @method BotShortDescription|PromiseInterface getMyShortDescription() Use this method to get the current bot short description for the given user language. Returns [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription) on success.
 *
 * Parameters:
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code or an empty string
 * @method bool|PromiseInterface leaveChat(array $parameters = []) Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @method bool|PromiseInterface logOut() Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
 * @method bool|PromiseInterface pinChatMessage(array $parameters = []) Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`              __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$message_id`           __Required: Yes__. Identifier of a message to pin
 * - _bool_   `$disable_notification` __Required: Optional__. Pass True, if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
 * @method bool|PromiseInterface promoteChatMember(array $parameters = []) Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`                __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$user_id`                __Required: Yes__. Unique identifier of the target user
 * - _bool_   `$is_anonymous`           __Required: Optional__. Pass True, if the administrator's presence in the chat is hidden
 * - _bool_   `$can_manage_chat`        __Required: Optional__. Pass True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * - _bool_   `$can_post_messages`      __Required: Optional__. Pass True, if the administrator can create channel posts, channels only
 * - _bool_   `$can_edit_messages`      __Required: Optional__. Pass True, if the administrator can edit messages of other users and can pin messages, channels only
 * - _bool_   `$can_delete_messages`    __Required: Optional__. Pass True, if the administrator can delete messages of other users
 * - _bool_   `$can_manage_video_chats` __Required: Optional__. Pass True, if the administrator can manage video chats
 * - _bool_   `$can_restrict_members`   __Required: Optional__. Pass True, if the administrator can restrict, ban or unban chat members
 * - _bool_   `$can_promote_members`    __Required: Optional__. Pass True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * - _bool_   `$can_change_info`        __Required: Optional__. Pass True, if the administrator can change chat title, photo and other settings
 * - _bool_   `$can_invite_users`       __Required: Optional__. Pass True, if the administrator can invite new users to the chat
 * - _bool_   `$can_pin_messages`       __Required: Optional__. Pass True, if the administrator can pin messages, supergroups only
 * - _bool_   `$can_post_stories`       __Required: Optional__. Pass True if the administrator can post stories in the channel; channels only
 * - _bool_   `$can_edit_stories`       __Required: Optional__. Pass True if the administrator can edit stories posted by other users; channels only
 * - _bool_   `$can_delete_stories`     __Required: Optional__. Pass True if the administrator can delete stories posted by other users; channels only
 * - _bool_   `$can_manage_topics`      __Required: Optional__. Pass True if the user is allowed to create, rename, close, and reopen forum topics, supergroups only
 * @method bool|PromiseInterface restrictChatMember(array $parameters = []) Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 *
 * Parameters:
 * - _string_          `$chat_id`                           __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_             `$user_id`                           __Required: Yes__. Unique identifier of the target user
 * - _ChatPermissions_ `$permissions`                       __Required: Yes__. A JSON-serialized object for new user permissions
 * - _bool_            `$use_independent_chat_permissions`  __Required: Optional__. Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * - _int_             `$until_date`                        __Required: Optional__. Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
 * @method ChatInviteLink|PromiseInterface revokeChatInviteLink(array $parameters = []) Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
 *
 * Parameters:
 * - _string_ `$chat_id`     __Required: Yes__. Unique identifier of the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$invite_link` __Required: Yes__. The invite link to revoke
 * @method Message|PromiseInterface sendAnimation(array $parameters = []) Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$animation`                   __Required: Yes__. Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More info on Sending Files »
 * - _int_             `$duration`                    __Required: Optional__. Duration of sent animation in seconds
 * - _int_             `$width`                       __Required: Optional__. Animation width
 * - _int_             `$height`                      __Required: Optional__. Animation height
 * - _InputFile_       `$thumbnail`                   __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * - _string_          `$caption`                     __Required: Optional__. Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the animation caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_            `$has_spoiler`                 __Required: Optional__. Pass True if the animation needs to be covered with a spoiler animation
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendAudio(array $parameters = []) Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
 *
 * For sending voice messages, use the [sendVoice](https://core.telegram.org/bots/api#sendvoice) method instead.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$audio`                       __Required: Yes__. Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * - _string_          `$caption`                     __Required: Optional__. Audio caption, 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the audio caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _int_             `$duration`                    __Required: Optional__. Duration of the audio in seconds
 * - _string_          `$performer`                   __Required: Optional__. Performer
 * - _string_          `$title`                       __Required: Optional__. Track name
 * - _InputFile_       `$thumbnail`                   __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method bool|PromiseInterface sendChatAction(array $parameters = []) Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 *
 * Example: The [ImageBot](https://t.me/imagebot) needs some time to process a request and upload the image. Instead of sending a text message along the lines of “Retrieving image, please wait…”, the bot may use [sendChatAction](https://core.telegram.org/bots/api#sendchataction) with action = upload_photo. The user will see a “sending photo” status for the bot.
 *
 * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
 *
 * Parameters:
 * - _string_ `$chat_id`           __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$message_thread_id` __Required: Optional__. Unique identifier for the target message thread; supergroups only
 * - _string_ `$action`            __Required: Yes__. Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
 * @method Message|PromiseInterface sendContact(array $parameters = []) Use this method to send phone contacts. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_   `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_      `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_   `$phone_number`                __Required: Yes__. Contact's phone number
 * - _string_   `$first_name`                  __Required: Yes__. Contact's first name
 * - _string_   `$last_name`                   __Required: Optional__. Contact's last name
 * - _string_   `$vcard`                       __Required: Optional__. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * - _bool_     `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_     `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_      `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_     `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_ `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendDice(array $parameters = []) Use this method to send an animated emoji that will display a random value. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_   `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_      `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_   `$emoji`                       __Required: Optional__. Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”, “🏀”, “⚽”, or “🎰”. Dice can have values 1-6 for “🎲” and “🎯”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
 * - _bool_     `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_     `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding
 * - _int_      `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_     `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_ `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendDocument(array $parameters = []) Use this method to send general files. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 *
 * Parameters:
 * - _string_          `$chat_id`                        __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`              __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$document`                       __Required: Yes__. File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * - _InputFile_       `$thumbnail`                      __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * - _string_          `$caption`                        __Required: Optional__. Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                     __Required: Optional__. Mode for parsing entities in the document caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`               __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_            `$disable_content_type_detection` __Required: Optional__. Disables automatic server-side content type detection for files uploaded using multipart/form-data
 * - _bool_            `$disable_notification`           __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`                __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`            __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply`    __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                   __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendGame(array $parameters = []) Use this method to send a game. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _int_                  `$chat_id`                     __Required: Yes__. Unique identifier for the target chat
 * - _int_                  `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_               `$game_short_name`             __Required: Yes__. Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather.
 * - _bool_                 `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_                 `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_                  `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_                 `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _InlineKeyboardMarkup_ `$reply_markup`                __Required: Optional__. A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
 * @method Message|PromiseInterface sendInvoice(array $parameters = []) Use this method to send invoices. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`                       __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_thread_id`             __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_               `$title`                         __Required: Yes__. Product name, 1-32 characters
 * - _string_               `$description`                   __Required: Yes__. Product description, 1-255 characters
 * - _string_               `$payload`                       __Required: Yes__. Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
 * - _string_               `$provider_token`                __Required: Yes__. Payments provider token, obtained via Botfather
 * - _string_               `$currency`                      __Required: Yes__. Three-letter ISO 4217 currency code, see more on currencies
 * - _LabeledPrice[]_       `$prices`                        __Required: Yes__. Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.)
 * - _int_                  `$max_tip_amount`                __Required: Optional__. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
 * - _int[]_                `$suggested_tip_amounts`         __Required: Optional__. A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
 * - _string_               `$start_parameter`               __Required: Optional__. Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
 * - _string_               `$provider_data`                 __Required: Optional__. A JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
 * - _string_               `$photo_url`                     __Required: Optional__. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
 * - _int_                  `$photo_size`                    __Required: Optional__. Photo size
 * - _int_                  `$photo_width`                   __Required: Optional__. Photo width
 * - _int_                  `$photo_height`                  __Required: Optional__. Photo height
 * - _bool_                 `$need_name`                     __Required: Optional__. Pass True, if you require the user's full name to complete the order
 * - _bool_                 `$need_phone_number`             __Required: Optional__. Pass True, if you require the user's phone number to complete the order
 * - _bool_                 `$need_email`                    __Required: Optional__. Pass True, if you require the user's email address to complete the order
 * - _bool_                 `$need_shipping_address`         __Required: Optional__. Pass True, if you require the user's shipping address to complete the order
 * - _bool_                 `$send_phone_number_to_provider` __Required: Optional__. Pass True, if user's phone number should be sent to provider
 * - _bool_                 `$send_email_to_provider`        __Required: Optional__. Pass True, if user's email address should be sent to provider
 * - _bool_                 `$is_flexible`                   __Required: Optional__. Pass True, if the final price depends on the shipping method
 * - _bool_                 `$disable_notification`          __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_                 `$protect_content`               __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_                  `$reply_to_message_id`           __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_                 `$allow_sending_without_reply`   __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _InlineKeyboardMarkup_ `$reply_markup`                  __Required: Optional__. A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
 * @method Message|PromiseInterface sendLocation(array $parameters = []) Use this method to send point on the map. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_   `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_      `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _float_    `$latitude`                    __Required: Yes__. Latitude of the location
 * - _float_    `$longitude`                   __Required: Yes__. Longitude of the location
 * - _float_    `$horizontal_accuracy`         __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * - _int_      `$live_period`                 __Required: Optional__. Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
 * - _int_      `$heading`                     __Required: Optional__. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * - _int_      `$proximity_alert_radius`      __Required: Optional__. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * - _bool_     `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_     `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_      `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_     `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_ `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendMediaGroup(array $parameters = []) Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of [Messages](https://core.telegram.org/bots/api#message) that were sent is returned.
 *
 * Parameters:
 * - _string_       `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_          `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputMedia[]_ `$media`                       __Required: Yes__. A JSON-serialized array describing messages to be sent, must include 2-10 items
 * - _bool_         `$disable_notification`        __Required: Optional__. Sends messages silently. Users will receive a notification with no sound.
 * - _bool_         `$protect_content`             __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * - _int_          `$reply_to_message_id`         __Required: Optional__. If the messages are a reply, ID of the original message
 * - _bool_         `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @method Message|PromiseInterface sendMessage(array $parameters = []) Use this method to send text messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_          `$text`                        __Required: Yes__. Text of the message to be sent, 1-4096 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the message text. See formatting options for more details.
 * - _MessageEntity[]_ `$entities`                    __Required: Optional__. A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
 * - _bool_            `$disable_web_page_preview`    __Required: Optional__. Disables link previews for links in this message
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendPhoto(array $parameters = []) Use this method to send photos. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$photo`                       __Required: Yes__. Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More info on Sending Files »
 * - _string_          `$caption`                     __Required: Optional__. Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the photo caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_            `$has_spoiler`                 __Required: Optional__. Pass True if the photo needs to be covered with a spoiler animation
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendPoll(array $parameters = []) Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _string_          `$question`                    __Required: Yes__. Poll question, 1-300 characters
 * - _string[]_        `$options`                     __Required: Yes__. A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
 * - _bool_            `$is_anonymous`                __Required: Optional__. True, if the poll needs to be anonymous, defaults to True
 * - _string_          `$type`                        __Required: Optional__. Poll type, “quiz” or “regular”, defaults to “regular”
 * - _bool_            `$allows_multiple_answers`     __Required: Optional__. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * - _int_             `$correct_option_id`           __Required: Optional__. 0-based identifier of the correct answer option, required for polls in quiz mode
 * - _string_          `$explanation`                 __Required: Optional__. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * - _string_          `$explanation_parse_mode`      __Required: Optional__. Mode for parsing entities in the explanation. See formatting options for more details.
 * - _MessageEntity[]_ `$explanation_entities`        __Required: Optional__. A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode
 * - _int_             `$open_period`                 __Required: Optional__. Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * - _int_             `$close_date`                  __Required: Optional__. Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * - _bool_            `$is_closed`                   __Required: Optional__. Pass True, if the poll needs to be immediately closed. This can be useful for poll preview.
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendSticker(array $parameters = []) Use this method to send static .WEBP or [animated](https://telegram.org/blog/animated-stickers) .TGS stickers. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_    `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_       `$message_thread_id`              __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_ `$sticker`                     __Required: Yes__. Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a .WEBP file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * - _bool_      `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_      `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_       `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_      `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_  `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendVenue(array $parameters = []) Use this method to send information about a venue. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_   `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_      `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _float_    `$latitude`                    __Required: Yes__. Latitude of the venue
 * - _float_    `$longitude`                   __Required: Yes__. Longitude of the venue
 * - _string_   `$title`                       __Required: Yes__. Name of the venue
 * - _string_   `$address`                     __Required: Yes__. Address of the venue
 * - _string_   `$foursquare_id`               __Required: Optional__. Foursquare identifier of the venue
 * - _string_   `$foursquare_type`             __Required: Optional__. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
 * - _string_   `$google_place_id`             __Required: Optional__. Google Places identifier of the venue
 * - _string_   `$google_place_type`           __Required: Optional__. Google Places type of the venue. (See supported types.)
 * - _bool_     `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_     `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_      `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_     `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_ `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendVideo(array $parameters = []) Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as [Document](https://core.telegram.org/bots/api#document)). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$video`                       __Required: Yes__. Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More info on Sending Files »
 * - _int_             `$duration`                    __Required: Optional__. Duration of sent video in seconds
 * - _int_             `$width`                       __Required: Optional__. Video width
 * - _int_             `$height`                      __Required: Optional__. Video height
 * - _InputFile_       `$thumbnail`                   __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * - _string_          `$caption`                     __Required: Optional__. Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the video caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _bool_            `$has_spoiler`                 __Required: Optional__. Pass True if the video needs to be covered with a spoiler animation
 * - _bool_            `$supports_streaming`          __Required: Optional__. Pass True, if the uploaded video is suitable for streaming
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendVideoNote(array $parameters = []) As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * Parameters:
 * - _string_    `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_       `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_ `$video_note`                  __Required: Yes__. Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes by a URL is currently unsupported
 * - _int_       `$duration`                    __Required: Optional__. Duration of sent video in seconds
 * - _int_       `$length`                      __Required: Optional__. Video width and height, i.e. diameter of the video message
 * - _InputFile_ `$thumbnail`                   __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * - _bool_      `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_      `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_       `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_      `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_  `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method Message|PromiseInterface sendVoice(array $parameters = []) Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as [Audio](https://core.telegram.org/bots/api#audio) or [Document](https://core.telegram.org/bots/api#document)). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 *
 * Parameters:
 * - _string_          `$chat_id`                     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_             `$message_thread_id`           __Required: Optional__. Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * - _InputFile_       `$voice`                       __Required: Yes__. Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files »
 * - _string_          `$caption`                     __Required: Optional__. Voice message caption, 0-1024 characters after entities parsing
 * - _string_          `$parse_mode`                  __Required: Optional__. Mode for parsing entities in the voice message caption. See formatting options for more details.
 * - _MessageEntity[]_ `$caption_entities`            __Required: Optional__. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * - _int_             `$duration`                    __Required: Optional__. Duration of the voice message in seconds
 * - _bool_            `$disable_notification`        __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * - _bool_            `$protect_content`             __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * - _int_             `$reply_to_message_id`         __Required: Optional__. If the message is a reply, ID of the original message
 * - _bool_            `$allow_sending_without_reply` __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * - _Keyboard_        `$reply_markup`                __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 * @method bool|PromiseInterface setChatAdministratorCustomTitle(array $parameters = []) Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`      __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _int_    `$user_id`      __Required: Yes__. Unique identifier of the target user
 * - _string_ `$custom_title` __Required: Yes__. New custom title for the administrator; 0-16 characters, emoji are not allowed
 * @method bool|PromiseInterface setChatDescription(array $parameters = []) Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$description` __Required: Optional__. New chat description, 0-255 characters
 * @method bool|PromiseInterface setChatMenuButton(array $parameters = []) Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_     `$chat_id`     __Required: Optional__. Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
 * - _MenuButton_ `$menu_button` __Required: Optional__. A JSON-serialized object for the new bot's menu button. Defaults to MenuButtonDefault
 * @method bool|PromiseInterface setChatPermissions(array $parameters = []) Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_          `$chat_id`                           __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _ChatPermissions_ `$permissions`                       __Required: Yes__. A JSON-serialized object for new default chat permissions
 * - _bool_            `$use_independent_chat_permissions`  __Required: Yes__. Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * @method bool|PromiseInterface setChatPhoto(array $parameters = []) Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_    `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _InputFile_ `$photo`   __Required: Yes__. New chat photo, uploaded using multipart/form-data
 * @method bool|PromiseInterface setChatStickerSet(array $parameters = []) Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`          __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * - _string_ `$sticker_set_name` __Required: Yes__. Name of the sticker set to be set as the group sticker set
 * @method bool|PromiseInterface setChatTitle(array $parameters = []) Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _string_ `$title`   __Required: Yes__. New chat title, 1-255 characters
 * @method Message|bool|PromiseInterface setGameScore(array $parameters = []) Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 *
 * Parameters:
 * - _int_    `$user_id`              __Required: Yes__. User identifier
 * - _int_    `$score`                __Required: Yes__. New score, must be non-negative
 * - _bool_   `$force`                __Required: Optional__. Pass True, if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
 * - _bool_   `$disable_edit_message` __Required: Optional__. Pass True, if the game message should not be automatically edited to include the current scoreboard
 * - _int_    `$chat_id`              __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat
 * - _int_    `$message_id`           __Required: Optional__. Required if inline_message_id is not specified. Identifier of the sent message
 * - _string_ `$inline_message_id`    __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @method bool|PromiseInterface setMyCommands(array $parameters = []) Use this method to change the list of the bot's commands. See https://core.telegram.org/bots#commands for more details about bot commands. Returns True on success.
 *
 * Parameters:
 * - _BotCommand[]_    `$commands`      __Required: Yes__. A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
 * - _BotCommandScope_ `$scope`         __Required: Optional__. A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
 * - _string_          `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
 * @method bool|PromiseInterface setMyDefaultAdministratorRights(array $parameters = []) Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are are free to modify the list before adding the bot. Returns True on success.
 *
 * Parameters:
 * - _ChatAdministratorRights_ `$rights`       __Required: Optional__. A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
 * - _bool_                    `$for_channels` __Required: Optional__. Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
 * @method bool|PromiseInterface setPassportDataErrors(array $parameters = []) Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
 *
 * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 *
 * Parameters:
 * - _int_                    `$user_id` __Required: Yes__. User identifier
 * - _PassportElementError[]_ `$errors`  __Required: Yes__. A JSON-serialized array describing the errors
 * @method bool|PromiseInterface setStickerPositionInSet(array $parameters = []) Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 *
 * Parameters:
 * - _string_ `$sticker`  __Required: Yes__. File identifier of the sticker
 * - _int_    `$position` __Required: Yes__. New sticker position in the set, zero-based
 * @method bool|PromiseInterface setStickerSetThumbnail(array $parameters = []) Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Returns True on success.
 *
 * Parameters:
 * - _string_    `$name`      __Required: Yes__. Sticker set name
 * - _int_       `$user_id`   __Required: Yes__. User identifier of the sticker set owner
 * - _InputFile_ `$thumbnail` __Required: Optional__. A PNG image with the thumbnail, must be up to 128 kilobytes in size and have width and height exactly 100px, or a TGS animation with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/animated_stickers#technical-requirements for animated sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More info on Sending Files ». Animated sticker set thumbnail can't be uploaded via HTTP URL.
 * @method bool|PromiseInterface setWebhook(array $parameters = []) Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized [Update](https://core.telegram.org/bots/api#update). In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
 *
 * If you'd like to make sure that the Webhook request comes from Telegram, we recommend using a secret path in the URL, e.g. https://www.example.com/<token\>. Since nobody else knows your bot's token, you can be pretty sure it's us.
 *
 * Parameters:
 * - _string_    `$url`                  __Required: Yes__. HTTPS url to send updates to. Use an empty string to remove webhook integration
 * - _InputFile_ `$certificate`          __Required: Optional__. Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
 * - _string_    `$ip_address`           __Required: Optional__. The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
 * - _int_       `$max_connections`      __Required: Optional__. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
 * - _string[]_  `$allowed_updates`      __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
 * - _bool_      `$drop_pending_updates` __Required: Optional__. Pass True to drop all pending updates
 * @method bool|PromiseInterface setMyDescription(array $parameters = []) Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
 *
 * Parameters:
 * - _string_ `$description`   __Required: Optional__. New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
 * @method bool|PromiseInterface setMyName(array $parameters = []) Use this method to change the bot's name. Returns True on success.
 *
 * Parameters:
 * - _string_ `$name`   __Required: Optional__. New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
 * - _string_ `$language_code` __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no dedicated name.
 * @method bool|PromiseInterface setMyShortDescription(array $parameters = []) Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
 *
 * Parameters:
 * - _string_ `$short_description` __Required: Optional__. New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
 * - _string_ `$language_code`     __Required: Optional__. A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
 * @method bool|PromiseInterface setCustomEmojiStickerSetThumbnail(array $parameters = []) Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
 *
 * Parameters:
 * - _string_ `$name`            __Required: Yes__. Sticker set name
 * - _string_ `$custom_emoji_id` __Required: Optional__. Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the first sticker as the thumbnail.
 * @method bool|PromiseInterface setStickerEmojiList(array $parameters = []) Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * Parameters:
 * - _string_   `$sticker`    __Required: Yes__. File identifier of the sticker
 * - _string[]_ `$emoji_list` __Required: Yes__. A JSON-serialized list of 1-20 emoji associated with the sticker
 * @method bool|PromiseInterface setStickerKeywords(array $parameters = []) Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
 *
 * Parameters:
 * - _string_   `$sticker`  __Required: Yes__. File identifier of the sticker
 * - _string[]_ `$keywords` __Required: Optional__. A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
 * @method bool|PromiseInterface setStickerMaskPosition(array $parameters = []) Use this method to change the [mask position](https://core.telegram.org/bots/api#maskposition) of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
 *
 * Parameters:
 * - _string_       `$sticker`       __Required: Yes__. File identifier of the sticker
 * - _MaskPosition_ `$mask_position` __Required: Optional__. A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to remove the mask position
 * @method bool|PromiseInterface setStickerSetTitle(array $parameters = []) Use this method to set the title of a created sticker set. Returns True on success.
 *
 * Parameters:
 * - _string_ `$name`            __Required: Yes__. Sticker set name
 * - _string_ `$custom_emoji_id` __Required: Yes__. Sticker set title, 1-64 characters
 * @method Message|bool|PromiseInterface stopMessageLiveLocation(array $parameters = []) Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`           __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`        __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message with live location to stop
 * - _string_               `$inline_message_id` __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * - _InlineKeyboardMarkup_ `$reply_markup`      __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 * @method bool|PromiseInterface stopPoll(array $parameters = []) Use this method to stop a poll which was sent by the bot. On success, the stopped [Poll](https://core.telegram.org/bots/api#poll) is returned.
 *
 * Parameters:
 * - _string_               `$chat_id`      __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_                  `$message_id`   __Required: Yes__. Identifier of the original message with the poll
 * - _InlineKeyboardMarkup_ `$reply_markup` __Required: Optional__. A JSON-serialized object for a new message inline keyboard.
 * @method bool|PromiseInterface unbanChatMember(array $parameters = []) Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`        __Required: Yes__. Unique identifier for the target group or username of the target supergroup or channel (in the format @username)
 * - _int_    `$user_id`        __Required: Yes__. Unique identifier of the target user
 * - _bool_   `$only_if_banned` __Required: Optional__. Do nothing if the user is not banned
 * @method bool|PromiseInterface unbanChatSenderChat(array $parameters = []) Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`        __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$sender_chat_id` __Required: Yes__. Unique identifier of the target sender chat
 * @method bool|PromiseInterface unpinAllChatMessages(array $parameters = []) Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id` __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @method bool|PromiseInterface unpinChatMessage(array $parameters = []) Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
 *
 * Parameters:
 * - _string_ `$chat_id`    __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * - _int_    `$message_id` __Required: Optional__. Identifier of a message to unpin. If not specified, the most recent pinned message (by sending date) will be unpinned.
 * @method File|PromiseInterface uploadStickerFile(array $parameters = []) Use this method to upload a file with a sticker for later use in the [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset) and [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset) methods (the file can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
 *
 * Parameters:
 * - _int_       `$user_id`        __Required: Yes__. User identifier of sticker set owner
 * - _InputFile_ `$sticker`        __Required: Yes__. A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See [https://core.telegram.org/stickers](https://core.telegram.org/stickers) for technical requirements. [More information on Sending Files »](https://core.telegram.org/bots/api#sending-files)
 * - _string_    `$sticker_format` __Required: Yes__. Format of the sticker, must be one of “static”, “animated”, “video”
 *
 * @see https://core.telegram.org/bots/api
 */
trait HasTelegramMethods
{
    /**
     * Bot methods relations.
     *
     * @return string|null
     */
    protected function method(string $method)
    {
        if (class_exists($class = "WeStacks\\TeleBot\\Methods\\{$this->studly($method)}Method")) {
            return $class;
        }
    }

    private function studly(string $value): string
    {
        $words = explode(' ', str_replace(['-', '_'], ' ', $value));

        $studlyWords = array_map(fn ($word) => ucfirst($word), $words);

        return implode($studlyWords);
    }
}
