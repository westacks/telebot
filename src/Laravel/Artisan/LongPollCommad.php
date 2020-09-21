<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use Illuminate\Console\Command;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Objects\Update;

class LongPollCommad extends Command
{
    protected $signature = 'telebot:long-poll
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.} 
                {--O|once : Poll only one time (for debug purposes).}';

    protected $description = 'Ease the Process of polling for bot updates.';
    protected $bot;

    public function __construct(BotManager $bot)
    {
        parent::__construct();
        $this->bot = $bot;
    }

    public function handle()
    {
        $bots = $this->hasOption('all') ? $this->bot->bots() : [$this->argument('bot') ?? config('telebot.default')];
        $bots = collect($bots)->map(function ($key) {
            return [$key => 0];
        })->collapse()->toArray();

        $poll = true;

        while ($poll) {
            foreach ($bots as $bot => $offset) {
                $updates = $this->bot->bot($bot)
                    ->async(false)
                    ->exceptions(true)
                    ->getUpdates(array_merge(config("telebot.bots.$bot.poll", []), [
                        'offset' => $offset+1
                    ]));

                foreach ($updates as $update) {
                    $this->info("Bot: $bot. Update: $update->update_id. Type: '".$this->getUpdateType($update)."'");
                    $this->bot->bot($bot)->handleUpdate($update);
                    $offset = $update->update_id;
                }
            }
            if ($this->hasOption('once')) $poll = false;
        }
        return 0;
    }

    private function getUpdateType(Update $update)
    {
        return collect(array_keys($update->toArray()))->except('update_id')->first();
    }
}