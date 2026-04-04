<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one button of the reply keyboard. At most one of the fields other than text, icon_custom_emoji_id, and style must be used to specify the type of the button. For simple text buttons, String can be used instead of this object to specify the button text.
 * @property-read string $text Text of the button. If none of the fields other than text, icon_custom_emoji_id, and style are used, it will be sent as a message when the button is pressed
 * @property-read ?string $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown before the text of the button. Can only be used by bots that purchased additional usernames on Fragment or in the messages directly sent by the bot to private, group and supergroup chats if the owner of the bot has a Telegram Premium subscription.
 * @property-read ?string $style Optional. Style of the button. Must be one of “danger” (red), “success” (green) or “primary” (blue). If omitted, then an app-specific style is used.
 * @property-read ?KeyboardButtonRequestUsers $request_users Optional. If specified, pressing the button will open a list of suitable users. Identifiers of selected users will be sent to the bot in a “users_shared” service message. Available in private chats only.
 * @property-read ?KeyboardButtonRequestChat $request_chat Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its identifier to the bot in a “chat_shared” service message. Available in private chats only.
 * @property-read ?KeyboardButtonRequestManagedBot $request_managed_bot Optional. If specified, pressing the button will ask the user to create and share a bot that will be managed by the current bot. Available for bots that enabled management of other bots in the @BotFather Mini App. Available in private chats only.
 * @property-read ?bool $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
 * @property-read ?bool $request_location Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only.
 * @property-read ?KeyboardButtonPollType $request_poll Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
 * @property-read ?WebAppInfo $web_app Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a “web_app_data” service message. Available in private chats only.
 *
 * @see https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends TelegramObject
{
    public function __construct(
        public readonly string $text,
        public readonly ?string $icon_custom_emoji_id,
        public readonly ?string $style,
        public readonly ?KeyboardButtonRequestUsers $request_users,
        public readonly ?KeyboardButtonRequestChat $request_chat,
        public readonly ?KeyboardButtonRequestManagedBot $request_managed_bot,
        public readonly ?bool $request_contact,
        public readonly ?bool $request_location,
        public readonly ?KeyboardButtonPollType $request_poll,
        public readonly ?WebAppInfo $web_app,
    ) {
    }
}
