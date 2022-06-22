<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized [Update](https://core.telegram.org/bots/api#update). In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
 *
 * If you'd like to make sure that the Webhook request comes from Telegram, we recommend using a secret path in the URL, e.g. https://www.example.com/<token>. Since nobody else knows your bot's token, you can be pretty sure it's us.
 *
 * @property string    $url                  __Required: Yes__. HTTPS url to send updates to. Use an empty string to remove webhook integration
 * @property InputFile $certificate          __Required: Optional__. Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
 * @property string    $ip_address           __Required: Optional__. The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
 * @property int       $max_connections      __Required: Optional__. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
 * @property string[]  $allowed_updates      __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
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
