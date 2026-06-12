<?php

namespace WeStacks\TeleBot\Foundation;

enum MessageMode: string
{
    case HTML = 'html';
    case MARKDOWN = 'markdown';
}
