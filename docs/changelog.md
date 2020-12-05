# Changelog

All notable changes to `telebot` will be documented here

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
