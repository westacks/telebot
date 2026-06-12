<?php

namespace WeStacks\TeleBot\Foundation;

trait RateLimit
{
    private float $lastCheck;

    protected function rateLimit(float $seconds = 1): bool
    {
        if (!isset($this->lastCheck)) {
            $this->lastCheck = microtime(true);
            return true;
        }

        $now = microtime(true);

        if ($now - $this->lastCheck >= $seconds) {
            $this->lastCheck = $now;
            return true;
        }

        return false;
    }
}