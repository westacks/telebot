# Objects

The library provides an object for each JSON representation of [Telegram API](https://core.telegram.org/bots/api#available-types) object with same properties.

The sub-object's types are automaticaly casted when you create a new object instance, so you may fully rely on Telegram API [documentation](https://core.telegram.org/bots/api):

<!-- tabs:start -->

#### ** Input **

```php
$keyboard = \WeStacks\TeleBot\Objects\Keyboard::create([
    'inline_keyboard' => [[
        [
            'text' => 'Google',
            'url' => 'https://google.com/'
        ]
    ]]
]);

var_dump($keyboard);
```

#### ** Output **

```php
object(WeStacks\TeleBot\Objects\Keyboard\InlineKeyboardMarkup)#448 (1) {
  ["inline_keyboard"] => array(1) {
    [0] => array(1) {
      [0] => object(WeStacks\TeleBot\Objects\InlineKeyboardButton)#447 (2) {
        ["text"] => string(6) "Google"
        ["url"] => string(19) "https://google.com/"
      }
    }
  }
}
```

<!-- tabs:end -->

## Features

Each object of the library extends `\WeStacks\TeleBot\Interfaces\TelegramObject::class`, so the next things can be done with each library object:
<!-- tabs:start -->

#### ** Test data **

```php
$data = [
    'update_id' => 1234567,
    'message' => [
        'message_id' => 2345678,
        'from' => [
            'id' => 3456789,
            'is_bot' => false,
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]
    ]
];
$update = new Update($data);
```

#### ** Usage **

```php
// Chaining properties
$chatId = $update->message->from->id; // 3456789

// Using dot notation
$chatId = $update->get('message.from.is_bot'); // false

// Iterating properties
foreach ($update->message->from as $prop => $value)
{
    // id => 3456789
    // is_bot => false
    // first_name => 'John'
    // last_name => 'Doe'
}

// Get object JSON representaition
$jsonUpdate = $update->toJson();

// Get object associative array representaition
$arrayUpdate = $update->toArray();
```

<!-- tabs:end -->
