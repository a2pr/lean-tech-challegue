<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Facades\QuoteFacade;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->check()){
            return redirect()->route('quotes.secure');
        }

        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(5);

        return Inertia::render('FiveRandomQuotes', [
            'quotes' => $quoteViewDtos
        ]);
    }


    public function new()
    {
        if(auth()->check()){
            return redirect()->route('quotes.secure');
        }
        
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(5);

        return Inertia::render('FiveRandomQuotes', [
            'quotes' => $quoteViewDtos
        ]);
    }


    public function secure()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(10);

        return Inertia::render('TenSecureQuotes', [
            'quotes' => $quoteViewDtos
        ]);
    }


    public function secureAdd()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(10);

        return Inertia::render('TenSecureQuotes', [
            'quotes' => $quoteViewDtos
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
