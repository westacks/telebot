<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\Update;

/**
 * Use this method to receive incoming updates using long polling ([wiki](https://en.wikipedia.org/wiki/Push_technology#Long_polling)). Returns an Array of [Update](https://core.telegram.org/bots/api#update) objects.  __Notes__ __1.__ This method will not work if an outgoing webhook is set up. __2.__ In order to avoid getting duplicate updates, recalculate offset after each server response.
 *
 * @property int      $offset          __Required: Optional__. Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as [getUpdates](https://core.telegram.org/bots/api#getupdates) is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will be forgotten.
 * @property int      $limit           __Required: Optional__. Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 * @property int      $timeout         __Required: Optional__. Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
 * @property string[] $allowed_updates __Required: Optional__. A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See [Update](https://core.telegram.org/bots/api#update) for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used.  Please note that this parameter doesn't affect updates created before the call to getUpdates, so unwanted updates may be received for a short period of time.
 */
class GetUpdatesMethod extends TelegramMethod
{
    protected string $method = 'getUpdates';

    protected string $expect = 'Update[]';

    protected array $parameters = [
        'offset' => 'integer',
        'limit' => 'integer',
        'timeout' => 'integer',
        'allowed_updates' => 'string[]',
    ];

    public function mock($arguments)
    {
        return [
            new Update([
                'update_id' => $arguments['offset'] ? $arguments['offset'] + 1 : 1,
                'message' => [
                    'message_id' => 1,
                    'from' => [
                        'id' => 1,
                        'is_bot' => true,
                        'first_name' => 'First',
                        'last_name' => 'Last',
                        'username' => 'username',
                        'language_code' => 'en-US',
                    ],
                    'chat' => [
                        'id' => 1,
                        'first_name' => 'First',
                        'last_name' => 'Last',
                        'username' => 'username',
                        'type' => 'private',
                    ],
                    'date' => 1,
                    'text' => 'text',
                ],
            ]),
        ];
    }
}
