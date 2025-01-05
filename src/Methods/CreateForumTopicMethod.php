<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\ForumTopic;

/**
 * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a [ForumTopic](https://core.telegram.org/bots/api#forumtopic) object.
 *
 * @property string $chat_id              __Required: Yes__. Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property string $name                 __Required: Yes__. Topic name, 1-128 characters
 * @property int    $icon_color           __Required: Optional__. Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
 * @property string $icon_custom_emoji_id __Required: Optional__. Unique identifier of the custom emoji shown as the topic icon. Use [getForumTopicIconStickers](https://core.telegram.org/bots/api#getforumtopiciconstickers) to get all allowed custom emoji identifiers.
 */
class CreateForumTopicMethod extends TelegramMethod
{
    protected string $method = 'createForumTopic';

    protected string $expect = 'ForumTopic';

    protected array $parameters = [
        'chat_id' => 'string',
        'name' => 'string',
        'icon_color' => 'integer',
        'icon_custom_emoji_id' => 'string',
    ];

    protected function mock($arguments): ForumTopic
    {
        return new ForumTopic([
            'message_thread_id' => -1,
            'name' => $arguments['name'],
            'icon_color' => $arguments['icon_color'] ?? '255,255,255',
            'icon_custom_emoji_id' => $arguments['icon_custom_emoji_id'] ?? null,
        ]);
    }
}
