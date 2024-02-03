<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\QuoteApiResponseDto;
use App\DataTransferObjects\QuoteViewDto;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Facades\QuoteFacade;
use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 *    title="Quote api",
 *    version="1.0.0",
 * )
 */
class QuoteApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/quotes",
     *     tags={"Quotes"},
     *     summary="Get quotes",
     *     @OA\Response(response="200", description="List of quotes"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function index()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(5);
        $quotes = [];
        foreach ($quoteViewDtos as $value) {
            $quotes[] = $this->makeQuoteApiResponse($value);
        }

        return response()->json(['quotes' => $quotes], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/quotes/new",
     *     tags={"Quotes"},
     *     summary="Get quotes",
     *     @OA\Response(response="200", description="fetch a new list of quotes"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function new()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(5);

        $quotes = [];
        foreach ($quoteViewDtos as $value) {
            $quotes[] = $this->makeQuoteApiResponse($value);
        }

        return response()->json(['quotes' => $quotes], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/secure-quotes",
     *     tags={"Quotes"},
     *     summary="Get secure quotes",
    *     security={{"bearerAuth": {}}},
     *     @OA\Response(response="200", description="List of secure quotes"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function secure()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotes(10);
        $quotes = [];
        foreach ($quoteViewDtos as $value) {
            $quotes[] = $this->makeQuoteApiResponse($value);
        }

        return response()->json(['quotes' => $quotes], 200);
    }

    /**
     * 
     * @OA\Post(
     *     path="/api/secure-quotes/new",
     *     tags={"Quotes"},
     *     summary="Get new sercure quotes",
    *     security={{ "bearerAuth": {} }},
     *     @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *         )
    *      ),
    *      @OA\Response(response="200", description="List of quotes"),
     *     @OA\Response(response="401", description="Unauthorized"),
    * )
    */
    public function secureAdd()
    {
        $quoteFacade = new QuoteFacade;
        $quoteViewDtos = $quoteFacade->getQuotesFromService(10);
        $quotes = [];
        foreach ($quoteViewDtos as $value) {
            $quotes[] = $this->makeQuoteApiResponse($value);
        }

        return response()->json(['quotes' => $quotes], 200);
    }

    private function makeQuoteApiResponse(QuoteViewDto $dto): QuoteApiResponseDto 
    {
        return new QuoteApiResponseDto(sprintf("%s '%s'", $dto->quote, $dto->cached ? 'cached': 'new')); 
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
