<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\QuoteViewDto;
use App\Services\RandomImageService;
use App\Services\ZenQuotesService;
use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;

class TodayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quoteService = new ZenQuotesService;
        $imageService = new RandomImageService;

        $currentDateTime = Carbon::now();
        $quotes = Quote::where('expire_ts', '>', $currentDateTime)->get();

        if(count($quotes) == 0){  
            $quotes = $quoteService->getQuotes(1);
            //save in cache
            $newQuote = new Quote();
            $newQuote->quote = $quotes[0]->getQuote();
            $newQuote->save();
            
            $quoteToViewDto = $quotes[0];
        } else {
            
            $value = $quotes->random();
            $quoteToViewDto = new QuoteViewDto($value['id'], $value['quote'], true);
        }

        $image = $imageService->getRandomImage();

        $authenticated = auth()->check();
        //dd($quoteToViewDto);
        return Inertia::render('Today', [
            'quoteDto' => $quoteToViewDto,
            'imageLink' => $image->getLink(),
            'cached' => $quoteToViewDto->isCached(),
            'isNew' => false,
            'authenticatedUser'=> $authenticated
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function new()
    {
        $quoteService = new ZenQuotesService;
        $imageService = new RandomImageService;

        $quotes = $quoteService->getQuotes(1);
        //save in cache
        $newQuote = new Quote();
        $newQuote->quote = $quotes[0]->getQuote();
        $newQuote->save();
        
        $quoteToViewDto = new QuoteViewDto($newQuote['id'], $newQuote['quote'], false);
    
        $authenticated = auth()->check();
        $image = $imageService->getRandomImage();

        return Inertia::render('Today', [
            'quoteDto' => $quoteToViewDto,
            'imageLink' => $image->getLink(),
            'cached' => $quoteToViewDto->isCached(),
            'isNew' => true,
            'authenticatedUser'=> $authenticated
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
