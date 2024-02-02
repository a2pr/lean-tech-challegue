<?php

namespace Tests\Unit;

use App\DataTransferObjects\QuoteServiceDto;
use App\DataTransferObjects\QuoteViewDto;
use App\Facades\QuoteFacade;
use App\Models\Quote;
use Tests\TestCase;

class QuoteFacadeTest extends TestCase
{
    public function setUp(): void
   {
        parent::setUp();
        Quote::on('sqlite_testing');
    }


//    public function tearDown(): void
//    {
//        Quote::truncate();
//    }

    /**
     * A basic unit test example.
     */
    public function testQuoteModelToQuoteView(): void
    {
        $testQuote = new Quote();
        $testQuote->quote='test test test';
        $testQuote->save();

        $quoteFacade = new QuoteFacade;
        $quoteView = $quoteFacade->modelToView($testQuote);

        $this->assertInstanceOf(QuoteViewDto::class, $quoteView);
        $testQuote->delete();
    }

    public function testSaveQuoteInCache(){
        $quoteServiceDto = new QuoteServiceDto('test test');

        $quoteFacade = new QuoteFacade;
        $result = $quoteFacade->saveQuoteInCache($quoteServiceDto);

        $this->assertInstanceOf(Quote::class, $result);
        $this->assertEquals($quoteServiceDto->getQuote(), $result['quote']);
    }

    public function testGetQuotesFromService(){
        $quoteFacade = new QuoteFacade;
        $result = $quoteFacade->getQuotesFromService(5);
        $this->assertCount(5,$result);
    }

    public function testGetQuotesFromCache(){
        Quote::truncate();
        $quoteFacade = new QuoteFacade;

        $testQuote1 = new Quote();
        $testQuote1->quote='test test test'. rand(1,100);
        $testQuote1->save();

        $testQuote2 = new Quote();
        $testQuote2->quote='test test test'. rand(1,100);
        $testQuote2->save();
        
        $result = $quoteFacade->getQuotesFromCache(2);

        $this->assertCount(2, $result);
    }

    public function testGetQuotesFromCacheMissingQuotes(){
        Quote::truncate();
        $quoteFacade = new QuoteFacade;

        $testQuote1 = new Quote();
        $testQuote1->quote='test test test'. rand(1,100);
        $testQuote1->save();
        
        $result = $quoteFacade->getQuotesFromCache(2);

        $this->assertCount(1, $result);
    }

    public function testGetQuotesComesFromService(){
        Quote::truncate();
        $quoteFacade = new QuoteFacade;

        $result = $quoteFacade->getQuotes(2);

        $this->assertCount(2, $result);
        foreach ($result as $value) {
            $this->assertFalse($value->cached);
        }
    }

    public function testGetQuotesComesFromCache(){
        Quote::truncate();
        $quoteFacade = new QuoteFacade;

        $testQuote1 = new Quote();
        $testQuote1->quote='test test test'. rand(1,100);
        $testQuote1->save();

        $testQuote2 = new Quote();
        $testQuote2->quote='test test test'. rand(1,100);
        $testQuote2->save();

        $result = $quoteFacade->getQuotes(2);

        $this->assertCount(2, $result);
        foreach ($result as $value) {
            $this->assertTrue($value->cached);
        }
    }
}
