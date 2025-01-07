<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized [Update](https://core.telegram.org/bots/api#update). In case of an unsuccessful request (a request with response [HTTP status code](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) different from 2XY), we will repeat the request and give up after a reasonable amount of attempts. Returns True on success.If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.  __Notes__ __1.__ You will not be able to receive updates using [getUpdates](https://core.telegram.org/bots/api#getupdates) for as long as an outgoing webhook is set up. __2.__ To use a self-signed certificate, you need to upload your [public key certificate](https://core.telegram.org/bots/self-signed) using certificate parameter. Please upload as InputFile, sending a String will not work. __3.__ Ports currently supported for webhooks: __443, 80, 88, 8443__.  If you're having any trouble setting up webhooks, please check out this [amazing guide to webhooks](https://core.telegram.org/bots/webhooks).
 *
 * @property string    $url                  __Required: Yes__. HTTPS URL to send updates to. Use an empty string to remove webhook integration
 * @property InputFile $certificate          __Required: Optional__. Upload your public key certificate so that the root certificate in use can be checked. See our [self-signed guide](https://core.telegram.org/bots/self-signed) for details.
 * @property string    $ip_address           __Required: Optional__. The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
 * @property int       $max_connections      __Required: Optional__. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
 * @property string[]  $allowed_updates      __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See [Update](https://core.telegram.org/bots/api#update) for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used. Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
 * @property bool      $drop_pending_updates __Required: Optional__. Pass True to drop all pending updates
 * @property string    $secret_token         __Required: Optional__. A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a webhook set by you.
 */
class SetWebhookMethod extends TelegramMethod
{
    protected string $method = 'setWebhook';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'url' => 'string',
        'certificate' => 'InputFile',
        'ip_address' => 'string',
        'max_connections' => 'integer',
        'allowed_updates' => 'string[]',
        'drop_pending_updates' => 'boolean',
        'secret_token' => 'string',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
