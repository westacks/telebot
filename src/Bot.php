<?php

namespace WeStacks\TeleBot;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Methods\GetMeMethod;
use WeStacks\TeleBot\Methods\SendMessageMethod;
use WeStacks\TeleBot\Methods\SendPhotoMethod;
use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Methods\DeleteWebhookMethod;
use WeStacks\TeleBot\Methods\EditMessageLiveLocationMethod;
use WeStacks\TeleBot\Methods\ForwardMessageMethod;
use WeStacks\TeleBot\Methods\GetUpdatesMethod;
use WeStacks\TeleBot\Methods\GetWebhookInfoMethod;
use WeStacks\TeleBot\Methods\SendAnimationMethod;
use WeStacks\TeleBot\Methods\SendAudioMethod;
use WeStacks\TeleBot\Methods\SendContactMethod;
use WeStacks\TeleBot\Methods\SendDocumentMethod;
use WeStacks\TeleBot\Methods\SendLocationMethod;
use WeStacks\TeleBot\Methods\SendMediaGroupMethod;
use WeStacks\TeleBot\Methods\SendVenueMethod;
use WeStacks\TeleBot\Methods\SendVideoMethod;
use WeStacks\TeleBot\Methods\SendVideoNoteMethod;
use WeStacks\TeleBot\Methods\SendVoiceMethod;
use WeStacks\TeleBot\Methods\SetWebhookMethod;
use WeStacks\TeleBot\Methods\StopMessageLiveLocationMethod;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\WebhookInfo;

/**
 * This class represents a bot instance. This is basicaly main controller for sending your Telegram requests.
 * 
 * @method True|PromiseInterface|False          deleteWebhook()                                     Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success. Requires no parameters.
 * @method Message|PromiseInterface|False       editMessageLiveLocation()                           Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
 * @method Message|PromiseInterface|False       forwardMessage(array $parameters = [])              Use this method to forward messages of any kind. On success, the sent Message is returned.
 * @method User|PromiseInterface|False          getMe()                                             A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method Update[]|PromiseInterface|False      getUpdates(array $parameters = [])                  Use this method to send photos. On success, the sent Message is returned.
 * @method WebhookInfo|PromiseInterface|False   getWebhookInfo()                                    Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
 * @method Message|PromiseInterface|False       sendAnimation(array $parameters = [])               Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False       sendAudio(array $parameters = [])                   Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future. For sending voice messages, use the sendVoice method instead.
 * @method Message|PromiseInterface|False       sendContact(array $parameters = [])                 Use this method to send phone contacts. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendDocument(array $parameters = [])                Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False       sendLocation(array $parameters = [])                Use this method to send point on the map. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendMediaGroup(array $parameters = [])              Use this method to send a group of photos or videos as an album. On success, an array of the sent Messages is returned.
 * @method Message|PromiseInterface|False       sendMessage(array $parameters = [])                 Use this method to send text messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendPhoto(array $parameters = [])                   Use this method to send photos. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendVenue(array $parameters = [])                   Use this method to send information about a venue. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendVideo(array $parameters = [])                   Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
 * @method Message|PromiseInterface|False       sendVideoNote(array $parameters = [])               As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendVoice(array $parameters = [])                   Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
 * @method True|PromiseInterface|False          setWebhook(array $parameters = [])                  Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
 * @method Message|PromiseInterface|False       stopMessageLiveLocation(array $parameters = [])     Use this method to stop updating a live location message before live_period expires. On success, if the message was sent by the bot, the sent Message is returned, otherwise True is returned.
 *  
 * @package WeStacks\TeleBot
 */
class Bot
{
    protected $properties = [];
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

        $this->properties['token']      = $config['token'];
        $this->properties['exceptions'] = $config['exceptions'] ?? true;
        $this->properties['async']      = $config['async'] ?? false;
        $this->properties['handlers']   = [];

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

        $method = new $methods[$method]($this->properties['token'], $arguments);

        $exceptions = $this->exceptions ?? $this->properties['exceptions'];
        $async = $this->async ?? $this->properties['async'];

        $this->exceptions = null;
        $this->async = null;

        return $method->execute($exceptions, $async);
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

        $this->properties['handlers'][] = $handler;
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

        foreach ($this->properties['handlers'] as $handler)
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
     * Bot methods list for "call" magick
     * @return string[] 
     */
    protected function methods()
    {
        return [
            'deleteWebhook'             => DeleteWebhookMethod::class,
            'editMessageLiveLocation'   => EditMessageLiveLocationMethod::class,
            'forwardMessage'            => ForwardMessageMethod::class,
            'getMe'                     => GetMeMethod::class,
            'getUpdates'                => GetUpdatesMethod::class,
            'getWebhookInfo'            => GetWebhookInfoMethod::class,
            'sendAnimation'             => SendAnimationMethod::class,
            'sendAudio'                 => SendAudioMethod::class,
            'sendContact'               => SendContactMethod::class,
            'sendDocument'              => SendDocumentMethod::class,
            'sendLocation'              => SendLocationMethod::class,
            'sendMediaGroup'            => SendMediaGroupMethod::class,
            'sendMessage'               => SendMessageMethod::class,
            'sendPhoto'                 => SendPhotoMethod::class,
            'sendVenue'                 => SendVenueMethod::class,
            'sendVideo'                 => SendVideoMethod::class,
            'sendVideoNote'             => SendVideoNoteMethod::class,
            'sendVoice'                 => SendVoiceMethod::class,
            'setWebhook'                => SetWebhookMethod::class,
            'stopMessageLiveLocation'   => StopMessageLiveLocationMethod::class,
            // TODO: sendVenue method
        ];
    }
}