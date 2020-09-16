<?php

namespace WeStacks\TeleBot;

use Closure;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;
use Spatie\GuzzleRateLimiterMiddleware\RateLimiterMiddleware;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\WebhookInfo;
use WeStacks\TeleBot\Objects\UserProfilePhotos;
use WeStacks\TeleBot\Objects\File;
use WeStacks\TeleBot\Objects\ChatMember;
use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Poll;

/**
 * This class represents a bot instance. This is basicaly main controller for sending and handling your Telegram requests.
 * 
 * @method True|PromiseInterface|False                  deleteWebhook()                                                 Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success. Requires no parameters.
 * @method True|PromiseInterface|False                  sendChatAction(array $parameters = [])                          Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
 * @method Message|PromiseInterface|False               editMessageLiveLocation(array $parameters = [])                 Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Message|PromiseInterface|False               forwardMessage(array $parameters = [])                          Use this method to forward messages of any kind. On success, the sent Message is returned.
 * @method File|PromiseInterface|False                  getFile(array $parameters = [])                                 Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
 * @method User|PromiseInterface|False                  getMe()                                                         A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method Update[]|PromiseInterface|False              getUpdates(array $parameters = [])                              Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
 * @method UserProfilePhotos|PromiseInterface|False     getUserProfilePhotos(array $parameters = [])                    Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
 * @method WebhookInfo|PromiseInterface|False           getWebhookInfo()                                                Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 * @method Message|PromiseInterface|False               sendAnimation(array $parameters = [])                           Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False               sendAudio(array $parameters = [])                               Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future. For sending voice messages, use the sendVoice method instead.
 * @method Message|PromiseInterface|False               sendContact(array $parameters = [])                             Use this method to send phone contacts. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendDice(array $parameters = [])                                Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendDocument(array $parameters = [])                            Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False               sendLocation(array $parameters = [])                            Use this method to send point on the map. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendMediaGroup(array $parameters = [])                          Use this method to send a group of photos or videos as an album. On success, an array of the sent Messages is returned.
 * @method Message|PromiseInterface|False               sendMessage(array $parameters = [])                             Use this method to send text messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendPhoto(array $parameters = [])                               Use this method to send photos. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendPoll(array $parameters = [])                                Use this method to send a native poll. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendVenue(array $parameters = [])                               Use this method to send information about a venue. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendVideo(array $parameters = [])                               Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False               sendVideoNote(array $parameters = [])                           As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False               sendVoice(array $parameters = [])                               Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 * @method True|PromiseInterface|False                  setWebhook(array $parameters = [])                              Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
 * @method Message|PromiseInterface|False               stopMessageLiveLocation(array $parameters = [])                 Use this method to stop updating a live location message before live_period expires. On success, if the message was sent by the bot, the sent Message is returned, otherwise True is returned.
 * @method True|PromiseInterface|False                  kickChatMember(array $parameters = [])                          Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the group on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method True|PromiseInterface|False                  unbanChatMember(array $parameters = [])                         Use this method to unban a previously kicked user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. Returns True on success.
 * @method True|PromiseInterface|False                  restrictChatMember(array $parameters = [])                      Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate admin rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
 * @method True|PromiseInterface|False                  promoteChatMember(array $parameters = [])                       Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 * @method True|PromiseInterface|False                  setChatAdministratorCustomTitle(array $parameters = [])         Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
 * @method True|PromiseInterface|False                  setChatPermissions(array $parameters = [])                      Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members admin rights. Returns True on success.
 * @method String|PromiseInterface|False                exportChatInviteLink(array $parameters = [])                    Use this method to generate a new invite link for a chat; any previously generated link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the new invite link as String on success.
 * @method True|PromiseInterface|False                  setChatPhoto(array $parameters = [])                            Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method True|PromiseInterface|False                  deleteChatPhoto(array $parameters = [])                         Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method True|PromiseInterface|False                  setChatTitle(array $parameters = [])                            Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method True|PromiseInterface|False                  setChatDescription(array $parameters = [])                      Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
 * @method True|PromiseInterface|False                  pinChatMessage(array $parameters = [])                          Use this method to pin a message in a group, a supergroup, or a channel. The bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in the supergroup or 'can_edit_messages' admin right in the channel. Returns True on success.
 * @method True|PromiseInterface|False                  unpinChatMessage(array $parameters = [])                        Use this method to unpin a message in a group, a supergroup, or a channel. The bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in the supergroup or 'can_edit_messages' admin right in the channel. Returns True on success.
 * @method True|PromiseInterface|False                  leaveChat(array $parameters = [])                               Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
 * @method Chat|PromiseInterface|False                  getChat(array $parameters = [])                                 Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
 * @method Array<ChatMember>|PromiseInterface|False     getChatAdministrators(array $parameters = [])                   Use this method to get a list of administrators in a chat. On success, returns an Array of ChatMember objects that contains information about all chat administrators except other bots. If the chat is a group or a supergroup and no administrators were appointed, only the creator will be returned.
 * @method Integer|PromiseInterface|False               getChatMembersCount(array $parameters = [])                     Use this method to get the number of members in a chat. Returns Int on success.
 * @method ChatMember|PromiseInterface|False            getChatMember(array $parameters = [])                           Use this method to get information about a member of a chat. Returns a ChatMember object on success.
 * @method True|PromiseInterface|False                  setChatStickerSet(array $parameters = [])                       Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method True|PromiseInterface|False                  deleteChatStickerSet(array $parameters = [])                    Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
 * @method True|PromiseInterface|False                  answerCallbackQuery(array $parameters = [])                     Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
 * @method True|PromiseInterface|False                  setMyCommands(array $parameters = [])                           Use this method to change the list of the bot's commands. Returns True on success.
 * @method Array<BotCommand>|PromiseInterface|False     getMyCommands()                                                 Use this method to get the current list of the bot's commands. Requires no parameters. Returns Array of BotCommand on success.
 * @method Message|PromiseInterface|False               editMessageText(array $parameters = [])                         Use this method to edit text and game messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Message|PromiseInterface|False               editMessageCaption(array $parameters = [])                      Use this method to edit captions of messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Message|PromiseInterface|False               editMessageMedia(array $parameters = [])                        Use this method to edit animation, audio, document, photo, or video messages. If a message is a part of a message album, then it can be edited only to a photo or a video. Otherwise, message type can be changed arbitrarily. When inline message is edited, new file can't be uploaded. Use previously uploaded file via its file_id or specify a URL. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Message|PromiseInterface|False               editMessageReplyMarkup(array $parameters = [])                  Use this method to edit only the reply markup of messages. On success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Poll|PromiseInterface|False                  stopPoll(array $parameters = [])                                Use this method to stop a poll which was sent by the bot. On success, the stopped Poll with the final results is returned.
 * @method True|PromiseInterface|False                  deleteMessage(array $parameters = [])                           Use this method to delete a message, including service messages. Returns True on success.
 *  
 * @package WeStacks\TeleBot
 */
class Bot
{
    protected $config = [];
    protected $client = null;
    protected $async = null;
    protected $exceptions = null;

    /**
     * Create new instance of Telegram bot
     * 
     * @param mixed $config 
     * @return void 
     * @throws TeleBotObjectException 
     */
    public function __construct($config)
    {
        if (is_string($config)) $config = ['token' => $config];
        if (!is_array($config)) $config = [];
        if (!isset($config['token'])) throw TeleBotObjectException::configKeyIsRequired('token', self::class);

        $this->config['token']      = $config['token'];
        $this->config['exceptions'] = $config['exceptions'] ?? true;
        $this->config['async']      = $config['async'] ?? false;
        $this->config['rate_limit'] = $config['rate_limit'] ?? true;
        $this->config['handlers']   = [];
        
        $stack = HandlerStack::create();

        if ($this->config['rate_limit']) $stack->push(RateLimiterMiddleware::perSecond(1));
        else $stack->push(RateLimiterMiddleware::perSecond(30));

        $this->client = new Client(['http_errors' => false, 'handler' => $stack]);

        $this->addHandler($config['handlers'] ?? []);
    }

    /**
     * Call bot method
     * 
     * @param string $method 
     * @param mixed $arguments 
     * @return mixed 
     * @throws TeleBotMehtodException 
     */
    public function __call($method, $arguments)
    {
        $methods = $this->methods();
        if (!isset($methods[$method])) throw TeleBotMehtodException::methodNotFound($method);

        $method = new $methods[$method]($this->config['token'], $arguments);

        $exceptions = $this->exceptions ?? $this->config['exceptions'];
        $async = $this->async ?? $this->config['async'];

        $this->exceptions = null;
        $this->async = null;

        return $method->execute($this->client, $exceptions, $async);
    }

    /**
     * Call next method asynchronously
     * @param bool $async 
     * @return self 
     */
    public function async(bool $async = true)
    {
        $this->async = $async;
        return $this;
    }

    /**
     * Turn exceptions on for next method
     * @param bool $async 
     * @return self 
     */
    public function exceptions(bool $exceptions = true)
    {
        $this->exceptions = $exceptions;
        return $this;
    }

    /**
     * Add new update handler(s) to the bot instance
     * @param string|Closure|array $handler - string that representing `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     * @return void 
     * @throws TeleBotMehtodException 
     */
    public function addHandler($handler)
    {
        if (is_array($handler))
        {
            foreach ($handler as $sub)
                $this->addHandler($sub);
            return;
        }

        if (!$this->isUpdateHandler($handler))
            throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));

        $this->config['handlers'][] = $handler;
    }

    /**
     * Remove all update handlers from bot instance
     * @return void 
     */
    public function clearHandlers()
    {
        $this->config['handlers'] = [];
    }

    private function isUpdateHandler($handler)
    {
        return is_callable($handler) || 
            is_string($handler) && class_exists($handler) && is_subclass_of($handler, UpdateHandler::class);
    }

    /**
     * Handle given update
     * @param Update $update - Telegram update object. Leave empty to try to get it from incoming POST request (for handling webhook)
     * @return boolean 
     */
    public function handleUpdate(Update $update = null)
    {
        if(!$this->validUpdate($update)) return false;

        foreach ($this->config['handlers'] as $handler)
        {
            if (is_callable($handler))
            {
                $handler($update);
                continue;
            }

            if ($handler::trigger($update))
                (new $handler($this, $update))->handle();
        }

        return true;
    }

    private function validUpdate(&$update)
    {
        if (is_null($update))
        {
            $data = json_decode(file_get_contents('php://input'), true);
            if (is_null($data) || !isset($data['update_id'])) return false;
            $update = new Update($data);
        }

        return ($update instanceof Update);
    }

    /**
     * Get local bot instance commands registered by commands handlers
     * @return Array<BotCommand> 
     */
    public function getInstaneCommands()
    {
        $commands = [];

        foreach ($this->config['handlers'] as $handler)
        {
            if(is_string($handler) && class_exists($handler) && is_subclass_of($handler, CommandHandler::class))
            {
                $commands = array_merge($commands, $handler::getBotCommand());
            }
        }

        return $commands;
    }

    /**
     * Bot methods list for "call" magick
     * @return string[] 
     */
    protected function methods()
    {
        return [
            'deleteWebhook'                         => \WeStacks\TeleBot\Methods\DeleteWebhookMethod::class,
            'editMessageLiveLocation'               => \WeStacks\TeleBot\Methods\EditMessageLiveLocationMethod::class,
            'forwardMessage'                        => \WeStacks\TeleBot\Methods\ForwardMessageMethod::class,
            'getMe'                                 => \WeStacks\TeleBot\Methods\GetMeMethod::class,
            'getUpdates'                            => \WeStacks\TeleBot\Methods\GetUpdatesMethod::class,
            'getWebhookInfo'                        => \WeStacks\TeleBot\Methods\GetWebhookInfoMethod::class,
            'sendAnimation'                         => \WeStacks\TeleBot\Methods\SendAnimationMethod::class,
            'sendAudio'                             => \WeStacks\TeleBot\Methods\SendAudioMethod::class,
            'sendContact'                           => \WeStacks\TeleBot\Methods\SendContactMethod::class,
            'sendDocument'                          => \WeStacks\TeleBot\Methods\SendDocumentMethod::class,
            'sendLocation'                          => \WeStacks\TeleBot\Methods\SendLocationMethod::class,
            'sendMediaGroup'                        => \WeStacks\TeleBot\Methods\SendMediaGroupMethod::class,
            'sendMessage'                           => \WeStacks\TeleBot\Methods\SendMessageMethod::class,
            'sendPhoto'                             => \WeStacks\TeleBot\Methods\SendPhotoMethod::class,
            'sendPoll'                              => \WeStacks\TeleBot\Methods\SendPollMethod::class,
            'sendVenue'                             => \WeStacks\TeleBot\Methods\SendVenueMethod::class,
            'sendVideo'                             => \WeStacks\TeleBot\Methods\SendVideoMethod::class,
            'sendVideoNote'                         => \WeStacks\TeleBot\Methods\SendVideoNoteMethod::class,
            'sendVoice'                             => \WeStacks\TeleBot\Methods\SendVoiceMethod::class,
            'setWebhook'                            => \WeStacks\TeleBot\Methods\SetWebhookMethod::class,
            'stopMessageLiveLocation'               => \WeStacks\TeleBot\Methods\StopMessageLiveLocationMethod::class,
            'sendDice'                              => \WeStacks\TeleBot\Methods\SendDiceMethod::class,
            'sendChatAction'                        => \WeStacks\TeleBot\Methods\SendChatActionMethod::class,
            'getUserProfilePhotos'                  => \WeStacks\TeleBot\Methods\GetUserProfilePhotosMethod::class,
            'getFile'                               => \WeStacks\TeleBot\Methods\GetFileMethod::class,
            'editMessageText'                       => \WeStacks\TeleBot\Methods\EditMessageTextMethod::class,
            'editMessageCaption'                    => \WeStacks\TeleBot\Methods\EditMessageCaptionMethod::class,
            'editMessageMedia'                      => \WeStacks\TeleBot\Methods\EditMessageMediaMethod::class,
            'editMessageReplyMarkup'                => \WeStacks\TeleBot\Methods\EditMessageReplyMarkupMethod::class,
            'stopPoll'                              => \WeStacks\TeleBot\Methods\StopPollMethod::class,
            'deleteMessage'                         => \WeStacks\TeleBot\Methods\DeleteMessageMethod::class,
            'setChatPermissions'                    => \WeStacks\TeleBot\Methods\SetChatPermissionsMethod::class,
            'exportChatInviteLink'                  => \WeStacks\TeleBot\Methods\ExportChatInviteLinkMethod::class,
            'setChatPhoto'                          => \WeStacks\TeleBot\Methods\SetChatPhotoMethod::class,
            'deleteChatPhoto'                       => \WeStacks\TeleBot\Methods\DeleteChatPhotoMethod::class,
            'setChatTitle'                          => \WeStacks\TeleBot\Methods\SetChatTitleMethod::class,
            'setChatDescription'                    => \WeStacks\TeleBot\Methods\SetChatDescriptionMethod::class,
            'pinChatMessage'                        => \WeStacks\TeleBot\Methods\PinChatMessageMethod::class,
            'unpinChatMessage'                      => \WeStacks\TeleBot\Methods\UnpinChatMessageMethod::class,
            'getChat'                               => \WeStacks\TeleBot\Methods\GetChatMethod::class,
            'getChatAdministrators'                 => \WeStacks\TeleBot\Methods\GetChatAdministratorsMethod::class,
            'getChatMembersCount'                   => \WeStacks\TeleBot\Methods\GetChatMembersCountMethod::class,
            'getChatMember'                         => \WeStacks\TeleBot\Methods\GetChatMemberMethod::class,
            'setMyCommands'                         => \WeStacks\TeleBot\Methods\SetMyCommandsMethod::class,
            'getMyCommands'                         => \WeStacks\TeleBot\Methods\GetMyCommandsMethod::class,
            // TODO: write tests for next methods
            'kickChatMember'                        => \WeStacks\TeleBot\Methods\KickChatMemberMethod::class,
            'unbanChatMember'                       => \WeStacks\TeleBot\Methods\UnbanChatMemberMethod::class,
            'restrictChatMember'                    => \WeStacks\TeleBot\Methods\RestrictChatMemberMethod::class,
            'promoteChatMember'                     => \WeStacks\TeleBot\Methods\PromoteChatMemberMethod::class,
            'setChatAdministratorCustomTitle'       => \WeStacks\TeleBot\Methods\SetChatAdministratorCustomTitleMethod::class,
            'leaveChat'                             => \WeStacks\TeleBot\Methods\LeaveChatMethod::class,
            'setChatStickerSet'                     => \WeStacks\TeleBot\Methods\SetChatStickerSetMethod::class,
            'deleteChatStickerSet'                  => \WeStacks\TeleBot\Methods\DeleteChatStickerSetMethod::class,
            'answerCallbackQuery'                   => \WeStacks\TeleBot\Methods\AnswerCallbackQueryMethod::class,
            // TODO: sendSticker method
        ];
    }
}