<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is based on an emoji.
 *
 * @property string $type   Type of the reaction, always “emoji”
 * @property string $emoji  Reaction emoji. Currently, it can be one of 👍, 👎, ❤, 🔥, 🥰, 👏, 😁, 🤔, 🤯, 😱, 🤬, 😢, 🎉, 🤩, 🤮, 💩, 🙏, 👌, 🕊, 🤡, 🥱, 🥴, 😍, 🐳, ❤‍🔥, 🌚, 🌭, 💯, 🤣, ⚡, 🍌, 🏆, 💔, 🤨, 😐, 🍓, 🍾, 💋, 🖕, 😈, 😴, 😭, 🤓, 👻, 👨‍💻, 👀, 🎃, 🙈, 😇, 😨, 🤝, ✍, 🤗, 🫡, 🎅, 🎄, ☃, 💅, 🤪, 🗿, 🆒, 💘, 🙉, 🦄, 😘, 💊, 🙊, 😎, 👾, 🤷‍♂, 🤷, 🤷‍♀, 😡
 */
class ReactionTypeEmoji extends ReactionType
{
    protected $attributes = [
        'type' => 'string',
        'emoji' => 'string',
    ];
}
