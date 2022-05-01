<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use Illuminate\Console\Command;
use WeStacks\TeleBot\BotManager;

abstract class TeleBotCommand extends Command
{
    protected $bot;

    public function __construct(BotManager $bot)
    {
        parent::__construct();
        $this->bot = $bot;
    }

    /**
     * Check if passed options are valid.
     *
     * @return string|true - true if valid, error text if not
     */
    protected function validOptions()
    {
        if (! $this->option('setup') && ! $this->option('remove') && ! $this->option('info')) {
            return 'No task specified!';
        }

        if ($this->option('setup') && $this->option('remove')) {
            return 'You should not use --setup and --remove options in one command!';
        }

        return true;
    }

    /**
     * Get the list of bots for handling.
     *
     * @return array
     */
    protected function botsList()
    {
        return $this->hasOption('all') ? $this->bot->bots() : [$this->argument('bot') ?? config('telebot.default')];
    }
}
