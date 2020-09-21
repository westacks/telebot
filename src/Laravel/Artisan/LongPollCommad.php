<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\BotManager;
use WeStacks\TeleBot\Objects\Update;

class LongPollCommad extends Command
{
    protected $signature = 'telebot:polling
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.}
                {--L|log : Write updates into Laravel log.}
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

        $this->info('Polling telegram updates...');
        while ($poll) {
            foreach ($bots as $bot => $offset) {
                $updates = $this->bot->bot($bot)
                    ->async(false)
                    ->exceptions(true)
                    ->getUpdates(array_merge(config("telebot.bots.$bot.poll", []), [
                        'offset' => $offset+1
                    ]));

                foreach ($updates as $update) {
                    $this->info("Bot: '$bot'; update: $update->update_id; type: '".$this->getUpdateType($update)."'");
                    if ($this->option('log')) Log::debug("Bot: '$bot'; Update: $update");
                    $this->bot->bot($bot)->handleUpdate($update);
                    $bots[$bot] = $update->update_id;
                }
            }
            if ($this->option('once')) $poll = false;
        }
        return 0;
    }

    private function getUpdateType(Update $update)
    {
        return collect(array_keys($update->toArray()))->last();
    }
}
