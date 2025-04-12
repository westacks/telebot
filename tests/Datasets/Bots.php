<?php

use WeStacks\TeleBot\TeleBot;

dataset('bots', [
    'simple bot' => fn () => new TeleBot('test'),
]);
