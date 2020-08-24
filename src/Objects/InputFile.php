<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exceptions\TeleBotFileException;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
 * At least one of two: `$file` or `$contents` should be specified.
 * 
 * @property String|Resource        $file           _Optional_. The path to the file on the system or remote / resource.
 * @property String|Resource        $contents       _Optional_. The contents of the file to upload.
 * @property String                 $filename       _Optional_. The name of uploaded file.
 * 
 * @package WeStacks\TeleBot\Objects
 */
class InputFile extends InputMedia
{
    protected function relations()
    {
        return [
            'contents' => 'string|resource',
            'file'     => 'string|resource',
            'filename' => 'string'
        ];
    }

    public function toMultipart($name)
    {
        $data = ['name' => $name];

        if(isset($this->filename))
        {
            $data['filename'] = $this->filename;
        }

        if(!isset($this->contents) && isset($this->file))
        {
            if(is_resource($this->file))
                $this->properties['contents'] = stream_get_contents($this->file);

            else if(is_string($this->file) && file_exists($this->file))
                $this->properties['contents'] = file_get_contents($this->file);
        } 

        if(isset($this->contents))
        {
            $data['contents'] = $this->contents;
        }
        else throw TeleBotFileException::fileContentsIsEmpty();

        return $data;
    }
}