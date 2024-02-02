<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Facades\QuoteFacade;
use App\Http\Controllers\Controller;

class QuoteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(5);

        foreach ($quoteViewDtos as $value) {
            $value->quote = sprintf("%s '%s'", $value->quote, $value->cached ? 'cached': 'new'); 
        }

        return response()->json(['quotes' => $quoteViewDtos], 200);
    }

    public function new()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(5);

        foreach ($quoteViewDtos as $value) {
            $value->quote = sprintf("%s '%s'", $value->quote, $value->cached ? 'cached': 'new'); 
        }

        return response()->json(['quotes' => $quoteViewDtos], 200);
    }

    public function secure()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(10);

        foreach ($quoteViewDtos as $value) {
            $value->quote = sprintf("%s '%s'", $value->quote, $value->cached ? 'cached': 'new'); 
        }

        return response()->json(['quotes' => $quoteViewDtos], 200);
    }


    public function secureAdd()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(10);

        foreach ($quoteViewDtos as $value) {
            $value->quote = sprintf("%s '%s'", $value->quote, $value->cached ? 'cached': 'new'); 
        }

        return response()->json(['quotes' => $quoteViewDtos], 200);
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
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
