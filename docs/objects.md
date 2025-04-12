# Objects

The library provides **DTO (Data Transfer Object)** representations for each [Telegram API](https://core.telegram.org/bots/api#available-types) object. These DTOs mirror the structure and field names from the Telegram documentation exactly.

Each sub-object is **automatically cast** to its appropriate DTO class when you create a new instance, so you can rely entirely on the official [Telegram Bot API docs](https://core.telegram.org/bots/api) for expected fields and types.

## Interactions

All DTOs share a consistent and convenient interface. Below, we demonstrate how to work with the `Update` object.

```php
// 🔗 Accessing nested properties (standard chaining)
$chatId = $update->message->from->id; // 3456789

// 📍 Using dot notation (safe, readable)
$chatId = $update->get('message.from.is_bot'); // false

// 🔁 Iterating over properties
foreach ($update->message->from as $prop => $value) {
    echo "$prop => $value\n";
    // id => 3456789
    // is_bot => false
    // first_name => 'John'
    // last_name => 'Doe'
}

// 🔄 JSON representation
$jsonUpdate = $update->toJson();

// 🔃 Array representation
$arrayUpdate = $update->toArray();
```