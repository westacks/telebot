<?php

namespace WeStacks\TeleBot\Laravel\Artisan;

use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Objects\Update;

class LongPollCommad extends TeleBotCommand
{
    protected $signature = 'telebot:polling
                {bot? : The bot name defined in the config file.}
                {--A|all : Perform actions on all your bots.}
                {--L|log : Write updates into Laravel log.}
                {--O|once : Poll only one time (for debug purposes).}';

    protected $description = 'Ease the Process of polling for bot updates.';

    public function handle()
    {
        $bots = collect($this->botsList())->map(function ($key) {
            return [$key => 0];
        })->collapse()->toArray();

        $poll = true;

        $this->info('Polling telegram updates...');
        while ($poll) {
            foreach (array_keys($bots) as $bot) {
                $this->handleUpdates($bot, $bots[$bot]);
            }
            if ($this->option('once')) {
                $poll = false;
            }
        }

        return 0;
    }

    private function handleUpdates(string $bot, int &$offset)
    {
        $updates = $this->bot->bot($bot)
            ->async(false)
            ->exceptions(true)
            ->getUpdates(array_merge(config("telebot.bots.{$bot}.poll", []), [
                'offset' => $offset + 1,
            ]))
        ;

        foreach ($updates as $update) {
            $this->logUpdate($bot, $update);
            $this->bot->bot($bot)->handleUpdate($update);
            $offset = $update->update_id;
        }
    }

    private function logUpdate(string $bot, Update $update)
    {
        $this->info("Bot: '{$bot}'; update: {$update->update_id}; type: '".$this->getUpdateType($update)."'");
        if ($this->option('log')) {
            Log::debug("Bot: '{$bot}'; Update: {$update}");
        }
    }

    private function getUpdateType(Update $update)
    {
        return collect(array_keys($update->toArray()))->last();
    }
}
