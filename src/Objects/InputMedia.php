<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Objects\TelegramObject;

/**
 * This object represents the content of a media message to be sent. It should be one of: InputMediaAnimation, InputMediaDocument, InputMediaAudio, InputMediaPhoto, InputMediaVideo
 * 
 * @package WeStacks\TeleBot\Objects
 */
abstract class InputMedia extends TelegramObject {}