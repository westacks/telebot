<?php

namespace WeStacks\TeleBot\Laravel;

use JsonSerializable;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

/**
 * This class represents a bot instance. This is basicaly main controller for sending and handling your Telegram requests.
 * 
 * @method self                 getMyCommands(array $parameters = [])                   Use this method to get the current list of the bot's commands. Requires no parameters. Returns Array of BotCommand on success.
 * @method self                 getChatAdministrators(array $parameters = [])           Use this method to get a list of administrators in a chat. On success, returns an Array of ChatMember objects that contains information about all chat administrators except other bots. If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
 * @method self                 getGameHighScores(array $parameters = [])               Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. On success, returns an Array of GameHighScore objects.
 * @method self                 getChatMember(array $parameters = [])                   Use this method to get information about a member of a chat. Returns a ChatMember object on success.
 * @method self                 getChat(array $parameters = [])                         Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
 * @method self                 getFile(array $parameters = [])                         Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
 * @method self                 getChatMembersCount(array $parameters = [])             Use this method to get the number of members in a chat. Returns Int on success.
 * @method self                 getChatMemberCount(array $parameters = [])              Use this method to get the number of members in a chat. Returns Int on success.
 * @method self                 editMessageCaption(array $parameters = [])              Use this method to edit captions of messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method self                 editMessageLiveLocation(array $parameters = [])         Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method self                 editMessageMedia(array $parameters = [])                Use this method to edit animation, audio, document, photo, or video messages. If a message is a part of a message album, then it can be edited only to a photo or a video. Otherwise, message type can be changed arbitrarily. When inline message is edited, new file can't be uploaded. Use previously uploaded file via its file_id or specify a URL. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method self                 editMessageReplyMarkup(array $parameters = [])          Use this method to edit only the reply markup of messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method self                 editMessageText(array $parameters = [])                 Use this method to edit text and game messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method self                 forwardMessage(array $parameters = [])                  Use this method to forward messages of any kind. On success, the sent Message is returned.
 * @method self                 sendAnimation(array $parameters = [])                   Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 * @method self                 sendAudio(array $parameters = [])                       Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future. For sending voice messages, use the sendVoice method instead.
 * @method self                 sendContact(array $parameters = [])                     Use this method to send phone contacts. On success, the sent Message is returned.
 * @method self                 sendDice(array $parameters = [])                        Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
 * @method self                 sendDocument(array $parameters = [])                    Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 * @method self                 sendGame(array $parameters = [])                        Use this method to send a game. On success, the sent Message is returned.
 * @method self                 sendInvoice(array $parameters = [])                     Use this method to send invoices. On success, the sent Message is returned.
 * @method self                 sendLocation(array $parameters = [])                    Use this method to send point on the map. On success, the sent Message is returned.
 * @method self                 sendMediaGroup(array $parameters = [])                  Use this method to send a group of photos or videos as an album. On success, an array of the sent Messages is returned.
 * @method self                 sendMessage(array $parameters = [])                     Use this method to send text messages. On success, the sent Message is returned.
 * @method self                 sendPhoto(array $parameters = [])                       Use this method to send photos. On success, the sent Message is returned.
 * @method self                 sendPoll(array $parameters = [])                        Use this method to send a native poll. On success, the sent Message is returned.
 * @method self                 sendSticker(array $parameters = [])                     Use this method to send static .WEBP or animated .TGS stickers. On success, the sent Message is returned.
 * @method self                 sendVenue(array $parameters = [])                       Use this method to send information about a venue. On success, the sent Message is returned.
 * @method self                 sendVideo(array $parameters = [])                       Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 * @method self                 sendVideoNote(array $parameters = [])                   As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
 * @method self                 sendVoice(array $parameters = [])                       Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 * @method self                 setGameScore(array $parameters = [])                    Use this method to set the score of the specified user in a game. On success, if the message was sent by the bot, returns the edited Message, otherwise returns True. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
 * @method self                 stopMessageLiveLocation(array $parameters = [])         Use this method to stop updating a live location message before live_period expires. On success, if the message was sent by the bot, the sent Message is returned, otherwise True is returned.
 * @method self                 stopPoll(array $parameters = [])                        Use this method to stop a poll which was sent by the bot. On success, the stopped Poll with the final results is returned.
 * @method self                 getStickerSet(array $parameters = [])                   Use this method to get a sticker set. On success, a StickerSet object is returned.
 * @method self                 exportChatInviteLink(array $parameters = [])            Use this method to generate a new invite link for a chat; any previously generated link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the new invite link as String on success.
 * @method self                 addStickerToSet(array $parameters = [])                 Use this method to add a new sticker to a set created by the bot. You must use exactly one of the fields png_sticker or tgs_sticker. Animated stickers can be added to animated sticker sets and only to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
 * @method self                 answerCallbackQuery(array $parameters = [])             Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 * @method self                 answerPreCheckoutQuery(array $parameters = [])          Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
 * @method self                 answerShippingQuery(array $parameters = [])             If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
 * @method self                 createNewStickerSet(array $parameters = [])             Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker or tgs_sticker. Returns True on success.
 * @method self                 deleteChatPhoto(array $parameters = [])                 Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 deleteChatStickerSet(array $parameters = [])            Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method self                 deleteMessage(array $parameters = [])                   Use this method to delete a message, including service messages. Returns True on success.
 * @method self                 deleteStickerFromSet(array $parameters = [])            Use this method to delete a sticker from a set created by the bot. Returns True on success.
 * @method self                 deleteWebhook()                                         Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success. Requires no parameters.
 * @method self                 kickChatMember(array $parameters = [])                  Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the group on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 banChatMember(array $parameters = [])                   Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the group on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 leaveChat(array $parameters = [])                       Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 * @method self                 pinChatMessage(array $parameters = [])                  Use this method to pin a message in a group, a supergroup, or a channel. The bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in the supergroup or 'can_edit_messages' admin right in the channel. Returns True on success.
 * @method self                 promoteChatMember(array $parameters = [])               Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 * @method self                 restrictChatMember(array $parameters = [])              Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate admin rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 * @method self                 sendChatAction(array $parameters = [])                  Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 * @method self                 setChatAdministratorCustomTitle(array $parameters = []) Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 * @method self                 setChatDescription(array $parameters = [])              Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 setChatPermissions(array $parameters = [])              Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members admin rights. Returns True on success.
 * @method self                 setChatPhoto(array $parameters = [])                    Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 setChatStickerSet(array $parameters = [])               Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method self                 setChatTitle(array $parameters = [])                    Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method self                 setMyCommands(array $parameters = [])                   Use this method to change the list of the bot's commands. Returns True on success.
 * @method self                 deleteMyCommands(array $parameters = [])                Use this method to change the list of the bot's commands. See https://core.telegram.org/bots#commands for more details about bot commands. Returns True on success.
 * @method self                 setPassportDataErrors(array $parameters = [])           Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success. Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
 * @method self                 setStickerPositionInSet(array $parameters = [])         Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 * @method self                 setStickerSetThumb(array $parameters = [])              Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Returns True on success.
 * @method self                 setWebhook(array $parameters = [])                      Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
 * @method self                 unbanChatMember(array $parameters = [])                 Use this method to unban a previously kicked user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. Returns True on success.
 * @method self                 unpinChatMessage(array $parameters = [])                Use this method to unpin a message in a group, a supergroup, or a channel. The bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in the supergroup or 'can_edit_messages' admin right in the channel. Returns True on success.
 * @method self                 getUpdates(array $parameters = [])                      Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
 * @method self                 getUserProfilePhotos(array $parameters = [])            Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
 * @method self                 getMe()                                                 A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method self                 getWebhookInfo()                                        Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 * @method self                 createChatInviteLink(array $parameters = [])            Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
 * @method self                 editChatInviteLink(array $parameters = [])              Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the edited invite link as a ChatInviteLink object.
 * @method self                 revokeChatInviteLink(array $parameters = [])            Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the revoked invite link as ChatInviteLink object.
 * @method self                 close()                                                 Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
 * @method self                 logOut()                                                Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
 * @method self                 copyMessage(array $parameters = [])                     Use this method to copy messages of any kind. The method is analogous to the method forwardMessages, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
 * @method self                 unpinAllChatMessages(array $parameters = [])            Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in a supergroup or 'can_edit_messages' admin right in a channel. Returns True on success.
 */
class TelegramNotification implements JsonSerializable
{
    use HasTelegramMethods;

    protected $data;

    /**
     * Create new notification instance
     * @param string|null $data JSON data object representation 
     * @return void 
     */
    public function __construct(string $data = null)
    {
        $this->data = $data ? json_decode($data, true) : [
            'bot' => null,
            'actions' => []
        ];
    }
    
    public function __call(string $method, array $arguments)
    {
        if (!static::method($method)) {
            throw TeleBotMehtodException::methodNotFound($method);
        }

        $this->data['actions'][] = [
            'method' => $method,
            'arguments' => is_array($arguments[0]) ? $arguments[0] : []
        ];

        return $this;
    }

    /**
     * Set bot to send notification
     * 
     * @param string $bot 
     * 
     * @return $this 
     */
    public function bot(string $bot)
    {
        $this->data['bot'] = $bot;
        return $this;
    }

    public function jsonSerialize()
    {
        return $this->data;
    } 
}