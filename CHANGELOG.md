# Changelog

All notable changes to `telebot` will be documented in this file

## 1.0 - 2020-09-19

- Initial release

## 1.1 - 2020-09-21

- Added useful Laravel commands for bot development
- Docs updated, fixed some typos

## 1.2 - 2020-09-25

- Added `callHandler` method to run single update handler
- Updated and improved docs

## 1.3 - 2020-09-26

- Added `TelegramChannel` for Laravel's Notifications
- Refactored method call system
- Updated docs

## 1.4 - 2020-10-11

- Fixed phpdoc for `InlineQueryResult`
- Added helpers functions to `Update` object to get some parameters without validation
- Add reply functionality to `UpdateHandler` - firing bot methods on class instance will specify default values for parameters using incoming `Update` - `chat_id`, `user_id`, `message_id`, `callback_query_id`, `inline_message_id`, `inline_query_id`, `shipping_query_id`, `pre_checkout_query_id`. So the developers now not required to validate bunch of parameters to fire specific bot methods.

## 1.5 - 2020-11-08

- Fixed phpdoc for standalone core library
- Added automatic route generation for webhook in Laravel's service provider
- Bot API v5.0
- Updated dev package compatibility

## 1.6 - 2020-12-04

- Rate limit feature was droped as it is not working accurate with webhook requests - it's not comfortable to store last request time from already dead php process without any data storage. In case you want to slow down your bot requests you should figure it out by yourself.
- Droped `spatie/guzzle-rate-limiter-middleware` dependence.
- Added ability to change Bot API URL (in case you have [self hosted bot api](https://github.com/tdlib/telegram-bot-api))
- PHP 8 is now supported

## 1.7 - 2020-12-21

- `WeStacks\TeleBot\Laravel\TelegramMessage` renamed to `WeStacks\TeleBot\Laravel\TelegramNotification`.
- Telegram notification now can be sent only using `WeStacks\TeleBot\Laravel\TelegramNotification` object. Old array system is dropped
- When sending notification using `WeStacks\TeleBot\Laravel\TelegramNotification`, methods could be chained to send multiple messages in a row
## 1.7.1 - 2021-02-01

- Added `getConfig()` method to the `WeStacks\TeleBot\TeleBot` instance. It will return the passsed to the constructor config. [#8](https://github.com/westacks/telebot/issues/8)
- Added ability to [change](https://westacks.github.io/telebot/#/configuration?id=standalone) `WeStacks\TeleBot\TeleBot`'s config parameters "on the go" using get/set syntax.

## 1.8.0 - 2021-02-14
- `TeleBot::getConfig()` now returns only parameters that is used for library initialization.
- Added optional `name` parameter for `TeleBot` initialization. It is used to sign incoming bot commands from public groups/chats (ex.: `/start@CoolBot`).
- `UpdateHandler::trigger()` function now accepts `TeleBot` instance as second argument (breaking change).
- Added more details to the docs about `CommandHandler` usage.

## 1.9.0 - 2021-03-14
- Updated [Bot API](https://core.telegram.org/bots/api) to version 5.1

## 1.9.1 - 2021-03-19
- Fix minor and major severity issues

## 1.10.0 - 2021-04-28
- Updated [Bot API](https://core.telegram.org/bots/api) to version 5.2

## 1.10.1 - 2021-05-05
- Hotfix. Array of parameters is now has a default value as empty array when calling a bot method on UpdateHandler instance

## 1.11.0 - 2021-06-26
- Updated [Bot API](https://core.telegram.org/bots/api) to version 5.3

## 1.12.0 - 2021-07-12
- Added logger to log application errors to selected Telegram chat.

## 1.13.0 - 2021-11-06
- Updated [Bot API](https://core.telegram.org/bots/api) to version 5.4

## 1.14.0 - 2021-12-09
- Updated [Bot API](https://core.telegram.org/bots/api) to version 5.5

## 2.0.0 - 2022-06-06
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.0
- Refactored and optimized codebase. Updated all methods and objects along with latest Bot API. Some classes changed namespaces such as `CommandHandler`, `UpdateHandler`. Be aware during migration to the newer version.
- Added customizable Kernel for handling updates and registering bot commands
- Removed various library exceptions. Now only using `TeleBotException`
- Version `1.x` is dropped out of official support. Hovever pull requests are welcome to the `1.x` branch.

## 2.1.0 - 2022-06-22
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.1
- **Breaking**. `api_url` inside bot config now is a template string with `{TOKEN}` and `{METHOD}` placeholder (ex.: `https://api.telegram.org/bot{TOKEN}/{METHOD}`). This is useful when you have self hosted bot api or using Telegram's official testing Bot API.
- Created the view `telebot::webapp` which might be extended to build Telegram web apps easier.
- Fixed support for PHP 7.4
- Added ability to fake requests to Telegram bot api using `$bot->fake()->sendMessage(...)`
- Added new handler type `RequestInputHandler` which implements simplest state machine to request user input (e.g. #44). More details in documentation.
- Increased security of Laravel's webhook with stricter validation and implemented in Bot API v6.1 `secret_token` feature.

## 2.2.0 - 2022-08-23
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.2

## 2.3.0 - 2022-12-16
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.3
- Dropped support for PHP 7.4
- Webhook request now uses raw request parameters to prevent data changes from Laravel (fix [#60](https://github.com/westacks/telebot/issues/60))

## 2.4.0 - 2023-02-01
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.4
- Added Laravel 10 support

## 2.5.0 - 2023-02-18
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.5

## 2.6.0 - 2023-03-10
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.6

## 2.6.1 - 2023-03-16
- Refactor codebase
- Add callback handler
- Add middleware to authorize web app requests.
- Updated docs

## 2.7.0 - 2023-05-06
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.7

## 3.0.0 - 2023-08-15
- Laravel support migrated to separate package

## 3.1.0 - 2023-09-07
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.8

## 3.1.1 - 2023-10-06
- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.9

## 3.2.0 - 2024-03-13
- Updated [Bot API](https://core.telegram.org/bots/api) to version 7.1

## 3.3.0 - 2024-04-01
- Updated [Bot API](https://core.telegram.org/bots/api) to version 7.2

## 3.4.0 - 2025-01-07
- Updated [Bot API](https://core.telegram.org/bots/api) to version 8.2
