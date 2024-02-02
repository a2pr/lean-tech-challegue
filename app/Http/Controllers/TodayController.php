<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\QuoteViewDto;
use App\Facades\ImageFacade;
use App\Facades\QuoteFacade;
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
        $quoteFacade = new QuoteFacade;
        $imageService = new ImageFacade;

        $quoteToViewDto = $quoteFacade->getQuotes(1);
        $image = $imageService->getRandomImage();

        $authenticated = auth()->check();
        
        
        return Inertia::render('Today', [
            'quoteDto' => $quoteToViewDto[0],
            'imageLink' => $image->getLink(),
            'cached' => $quoteToViewDto[0]->isCached(),
            'isNew' => false,
            'authenticatedUser'=> $authenticated
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function new()
    {
        $quoteFacade = new QuoteFacade;
        $imageService = new ImageFacade;

        $quoteToViewDto = $quoteFacade->getQuotesFromService(1);
        $authenticated = auth()->check();
        $image = $imageService->getRandomImage();

        return Inertia::render('Today', [
            'quoteDto' => $quoteToViewDto[0],
            'imageLink' => $image->getLink(),
            'cached' => $quoteToViewDto[0]->isCached(),
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
