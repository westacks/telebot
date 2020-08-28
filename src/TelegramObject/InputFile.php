<?php

namespace WeStacks\TeleBot\TelegramObject;

use WeStacks\TeleBot\Exception\TeleBotFileException;

class InputFile
{
    /**
     * File name
     * @var string|null
     */
    protected $filename;

    /**
     * File contents
     * @var string|resource|false
     */
    protected $contents;

    /**
     * Is file given as URL
     * @var false
     */
    protected $isURL = false;

    public function __construct($file, string $filename = null)
    {
        $this->filename = $filename ?? 'input_file';

        if(filter_var($file, FILTER_VALIDATE_URL))
        {
            $this->contents = $file;
            $this->isURL = true;
        }
        else if(!$this->contents = fopen($file, 'r'))
        {
            throw TeleBotFileException::unableToOpenFileOrResource();
        }
    }
}