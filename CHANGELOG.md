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