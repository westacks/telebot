<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\InputRichMessage;

use function WeStacks\TeleBot\synthesize;

/**
 * @mixin \WeStacks\TeleBot\Foundation\UpdateHandler
 */
trait StreamsRichMessage
{
    private int $rmDraftId;
    private float $lastDraftSent;
    private string $buffer = '';

    protected function stream(
        string $chunk,
        ?int $draftId = null,
        ?int $chatId = null,
        ?int $messageThreadId = null,
        MessageMode $mode = MessageMode::MARKDOWN,
        bool $rtl = false,
        bool $entityDetection = true
    ): bool {
        if (! isset($this->rmDraftId)) {
            $this->rmDraftId = $draftId ?? random_int(1, PHP_INT_MAX);
        }

        $this->buffer .= $chunk;

        if (!$this->rateLimit()) {
            return false;
        }

        return $this->sendRichMessageDraft([
            'chat_id' => $chatId ?? $this->update->chat()->id ?? null,
            'message_thread_id' => $messageThreadId ?? $this->update->chat()?->is_forum ? ($this->update->message()->message_thread_id ?? null) : null,
            'draft_id' => $this->rmDraftId,
            'rich_message' => $this->getBufferedMessage($mode, $rtl, $entityDetection),
        ]);
    }

    protected function getBufferedMessage(MessageMode $mode = MessageMode::MARKDOWN, bool $rtl = false, bool $entityDetection = true): InputRichMessage
    {
        return synthesize([
            $mode->value => $this->buffer,
            'is_rtl' => $rtl,
            'skip_entity_detection' => !$entityDetection,
        ], InputRichMessage::class);
    }

    protected function rateLimit(): bool
    {
        if (!isset($this->lastDraftSent)) {
            $this->lastDraftSent = microtime(true);
            return true;
        }

        $now = microtime(true);

        if ($now - $this->lastDraftSent < 1) {
            return false;
        }

        $this->lastDraftSent = $now;
        return true;
    }
}
