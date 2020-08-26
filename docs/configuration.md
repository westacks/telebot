## Creating a bot instance

The first​ step is to initialize the library. Once you do that, You'll get access to all the available API Methods to make requests to Telegram.

<!-- tabs:start -->

#### ** Minimal **

```php
use WeStacks\TeleBot\Bot;

$bot = new Bot('<your bot token>');
```

#### ** Advanced **

You may provide an array with bot configuration (default config provided in example):

```php
use WeStacks\TeleBot\Bot;

$bot = new Bot([
    'token'      => '<your bot token>',    // Telegram API access token. Token is the only required field.
    'exceptions' => true,                  // Set `false` to completly turn off bot exceptions. Bot methods will return `false` on any kind of error
    'handlers'   => []                     // Array of update handlers (closure functions or UpdateHandlerInterface objects)
])
```

<!-- tabs:end -->

## Is it working?

---

To test it out you can execute a [getMe](https://core.telegram.org/bots/api#getme) method:

```php
$res = $bot->getMe();

echo $res->id;          // 1234567890
echo $res->first_name;  // Test Bot
echo $res;              // {"id":1234567890,"is_bot":true,"first_name":"Test Bot","username":"test_bot", ...}
```
