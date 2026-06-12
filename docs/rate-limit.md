# Rate Limit

The `WeStacks\TeleBot\Foundation\RateLimit` trait provides a simple mechanism for throttling operations within your update handlers. This is especially useful when working with **streaming responses**, **long-running tasks**, or any scenario where you need to limit how frequently certain actions occur.

## Usage

Apply the `RateLimit` trait to any `UpdateHandler` class, then call the `rateLimit()` method inside your `handle()` logic. The method returns `true` only once per specified interval (default: 1 second), allowing you to conditionally execute throttled code.

```php
use WeStacks\TeleBot\Foundation\UpdateHandler;
use WeStacks\TeleBot\Foundation\RateLimit;

class ChatHandler extends UpdateHandler
{
    use RateLimit;

    public function handle()
    {
        // Your handler logic here
        // Call $this->rateLimit() to throttle operations
    }
}
```

## The `rateLimit()` Method

```php
protected function rateLimit(float $seconds = 1): bool
```

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `$seconds` | `float` | `1` | Minimum interval (in seconds) between allowed operations |

Returns `true` if the specified interval has elapsed since the last call, and `false` otherwise.

## Real‑World Example: Streaming with Throttling

A common use case is sending partial results during a streaming AI response. The example below uses the [Prism](https://github.com/prism-php/prism) library to stream text from an LLM and sends draft updates to the user at most once per second.

```php
<?php

namespace App\Telegram\Handlers;

use Prism\Prism\Enums\StreamEventType;
use Prism\Prism\Facades\Prism;
use WeStacks\TeleBot\Foundation\UpdateHandler;
use WeStacks\TeleBot\Foundation\RateLimit;

class ChatHandler extends UpdateHandler
{
    use RateLimit;

    public function trigger(): bool
    {
        return $this->update->type('message');
    }

    public function handle()
    {
        $stream = Prism::text()
            ->using('openai', 'gpt-5')
            ->withPrompt($this->update->message->text)
            ->asStream();

        $buffer = '';
        $draftId = time();

        foreach ($stream as $event) {
            if ($event->type() === StreamEventType::TextDelta) {
                $buffer .= $event->delta;

                if ($this->rateLimit()) {
                    $this->sendRichMessageDraft([
                        'draft_id' => $draftId,
                        'rich_message' => [
                            'markdown' => $buffer,
                        ],
                    ]);
                }
            } else if ($event->type() === StreamEventType::StreamEnd) {
                $this->sendRichMessage([
                    'rich_message' => [
                        'markdown' => $buffer,
                    ],
                ]);
            }
        }

        return true;
    }
}
```

In this example:

- Each text delta from the stream is appended to `$buffer`.
- The `rateLimit()` method ensures that `sendRichMessageDraft` is called **at most once per second**, preventing the bot from flooding the user with rapid updates.
- When the stream ends, the final buffer is sent as a complete message via `sendRichMessage`.

## Custom Interval

You can adjust the throttling interval by passing a custom value to `rateLimit()`:

```php
// Throttle to once every 3 seconds
if ($this->rateLimit(3)) {
    // Send progress update
}
```

## Notes

- The trait stores the timestamp of the last allowed operation in a private `$lastCheck` property on the handler instance.
- The first call to `rateLimit()` always returns `true`.
- Each handler instance maintains its own timing state, so different handlers (or different bot instances) operate independently.
