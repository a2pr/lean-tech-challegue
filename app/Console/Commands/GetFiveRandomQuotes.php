<?php

namespace App\Console\Commands;

use App\Facades\QuoteFacade;
use Illuminate\Console\Command;


class GetFiveRandomQuotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-five-random-quotes {--new}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Five Random quotes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $isNewOptionSet = $this->option('new');

        $quoteFacade = new QuoteFacade;
        if ($isNewOptionSet) {
            $quoteViewDtos = $quoteFacade->getQuotesFromService(5);

            $this->info('New Option enable, Quotes:');
            foreach ($quoteViewDtos as $dto) {

                $this->info(sprintf("%s '%s'\n", $dto->quote, $dto->cached ? 'cached': 'new'));
            }            
        } else {

            $quoteViewDtos = $quoteFacade->getQuotes(5);

            $this->info('Quotes:');
            foreach ($quoteViewDtos as $dto) {

                $this->info(sprintf("%s '%s'\n", $dto->quote, $dto->cached ? 'cached': 'new'));
            }
        }
    }
}
