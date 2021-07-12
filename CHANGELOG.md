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