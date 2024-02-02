<?php

namespace App\Facades;

use App\DataTransferObjects\QuoteServiceDto;
use App\DataTransferObjects\QuoteViewDto;
use App\Services\RandomImageService;
use App\Services\ZenQuotesService;
use App\Models\Quote;
use Illuminate\Support\Carbon;

class QuoteFacade {

    public RandomImageService $imageService;
    public ZenQuotesService $quoteService;

    public function __construct() {
        $this->quoteService = new ZenQuotesService;
        $this->imageService = new RandomImageService;
    }


    public function getQuotes($limit = 1){
        $quoteCollection = $this->getQuotesFromCache($limit);

        $quoteViewDtos =[];
        if(count($quoteCollection) == 0){  
            $quotesFromService = $this->getQuotesFromService($limit);
            $quoteViewDtos = array_merge($quoteViewDtos, $quotesFromService);
        } else {

            if(count($quoteCollection) == $limit){
                foreach ($quoteCollection as $value) {
                    $quoteViewDtos[] = $this->modelToView($value, true);
                }
            }else{
                //get cache quotes
                foreach ($quoteCollection as $value) {
                    $quoteViewDtos[] = $this->modelToView($value, true);
                }

                $missingAmount = $limit - count($quoteCollection);
                //get not cache quotes
                $quoteViewDtos = array_merge($quoteViewDtos, $this->getQuotesFromService($missingAmount));
            }
        }

        return $quoteViewDtos;
    }

    public function getQuotesFromCache($limit = 1){
        $currentDateTime = Carbon::now();
        return Quote::where('expire_ts', '>', $currentDateTime)->limit($limit)->get();
    }

    public function getQuotesFromService($limit = 1){
        $quoteDtoServices = $this->quoteService->getQuotes($limit);
        $quoteModels = $quoteDtoViews = [];
        foreach ($quoteDtoServices as $quoteDto) {
            
            $quoteModels[] = $this->saveQuoteInCache($quoteDto);            
        }
        
        foreach ($quoteModels as $quoteModel) {
            $quoteDtoViews[] = $this->modelToview($quoteModel);
        }

        return $quoteDtoViews;
    }

    public function saveQuoteInCache(QuoteServiceDto $quoteDto){
        $newQuote = new Quote();
        $newQuote->quote = $quoteDto->getQuote();
        $newQuote->save();

        return $newQuote;
    }

    public function modelToView(Quote $quoteModel, $cached = false): QuoteViewDto
    {
        return new QuoteViewDto($quoteModel['id'], $quoteModel['quote'], $cached);
    }
}