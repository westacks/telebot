# Objects

The library provides an object relation map for each JSON representation of [Telegram API](https://core.telegram.org/bots/api#available-types) object with same properties.

The sub-object's types are automaticaly casted when you create a new object instance, so you may fully rely on Telegram API [documentation](https://core.telegram.org/bots/api).

### Interactions

The next things can be done with each library [object](https://core.telegram.org/bots/api#available-types), but we will use only `Update` object as example:
<!-- tabs:start -->

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

// Debugable =)  
var_dump($update);
```

#### ** Where $update came form? **

```php
$update = new Update([
    'update_id' => 1234567,
    'message' => [
        'message_id'  => 2345678,
        'from'        => [
            'id'          => 3456789,
            'is_bot'      => false,
            'first_name'  => 'John',
            'last_name'   => 'Doe'
        ]
    ]
]);
```

<!-- tabs:end -->
