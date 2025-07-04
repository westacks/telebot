# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 4.1.0 - 2025-07-04

### What's Changed

* [AUTO] Update Telegram Bot API by @github-actions in https://github.com/westacks/telebot/pull/126

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.6...4.1.0

## 4.0.6 - 2025-06-10

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.5...4.0.6

## 4.0.5 - 2025-05-12

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.4...4.0.5

## 4.0.4 - 2025-05-11

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.3...4.0.4

## 4.0.3 - 2025-05-08

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.2...4.0.3

## 4.0.2 - 2025-04-22

### What's Changed

* [AUTO] Update Telegram Bot API by @github-actions in https://github.com/westacks/telebot/pull/119
* [AUTO] Update Telegram Bot API by @github-actions in https://github.com/westacks/telebot/pull/120

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.1...4.0.2

## 4.0.1 - 2025-04-13

**Full Changelog**: https://github.com/westacks/telebot/compare/4.0.0...4.0.1

## 4.0.0 - 2025-04-12

**Full Changelog**: https://github.com/westacks/telebot/compare/3.4.2...4.0.0

## 3.4.0 - 2025-01-07

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 8.2.

## 3.3.0 - 2024-04-01

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 7.2.

## 3.2.0 - 2024-03-13

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 7.1.

## 3.1.1 - 2023-10-06

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.9.

## 3.1.0 - 2023-09-07

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.8.

## 3.0.0 - 2023-08-15

### Changed

- Migrated Laravel support to a separate package.

## 2.7.0 - 2023-05-06

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.7.

## 2.6.1 - 2023-03-16

### Added

- Callback handler.
- Middleware to authorize web app requests.

### Changed

- Refactored codebase.
- Updated documentation.

## 2.6.0 - 2023-03-10

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.6.

## 2.5.0 - 2023-02-18

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.5.

## 2.4.0 - 2023-02-01

### Added

- Support for Laravel 10.

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.4.

## 2.3.0 - 2022-12-16

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.3.
- Webhook requests now use raw request parameters to prevent data changes from Laravel.

### Removed

- Dropped support for PHP 7.4.

## 2.2.0 - 2022-08-23

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.2.

## 2.1.0 - 2022-06-22

### Added

- View `telebot::webapp` to facilitate building Telegram web apps.
- Ability to fake requests to Telegram bot API using `$bot->fake()->sendMessage(...)`.
- New handler type `RequestInputHandler` implementing a simple state machine to request user input.

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.1.
- `api_url` in bot config is now a template string with `{TOKEN}` and `{METHOD}` placeholders.
- Enhanced security of Laravel's webhook with stricter validation and implemented `secret_token` feature from Bot API v6.1.

### Fixed

- Support for PHP 7.4.

## 2.0.0 - 2022-06-06

### Added

- Customizable Kernel for handling updates and registering bot commands.

### Changed

- Updated [Bot API](https://core.telegram.org/bots/api) to version 6.0.
- Refactored and optimized codebase; updated all methods and objects to align with the latest Bot API.
- Some classes changed namespaces, such as `CommandHandler` and `UpdateHandler`.

### Removed

- Various library exceptions; now only using `TeleBotException`.
- Official support for version `1.x` (though pull requests are welcome to the `1.x` branch).
