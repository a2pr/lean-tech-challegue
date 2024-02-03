<?php

namespace Tests\Unit;

use App\Services\ZenQuotesService;
use App\DataTransferObjects\QuoteServiceDto;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ZenQuotesServiceTest extends TestCase
{
    const TEST_JSON = [
        [
              "q" => "Don't explain your philosophy. Embody it.", 
              "a" => "Epictetus", 
              "c" => "41", 
              "h" => "<blockquote>&ldquo;Don't explain your philosophy. Embody it.&rdquo; &mdash; <footer>Epictetus</footer></blockquote>" 
        ], 
        [
                 "q" => "Be yourself; everyone else is already taken ", 
                 "a" => "Oscar Wilde", 
                 "c" => "44", 
                 "h" => "<blockquote>&ldquo;Be yourself; everyone else is already taken &rdquo; &mdash; <footer>Oscar Wilde</footer></blockquote>" 
        ], 
        [
                    "q" => "Progress lies not in enhancing what is, but in advancing toward what will be.", 
                    "a" => "Kahlil Gibran", 
                    "c" => "77", 
                    "h" => "<blockquote>&ldquo;Progress lies not in enhancing what is, but in advancing toward what will be.&rdquo; &mdash; <footer>Kahlil Gibran</footer></blockquote>" 
        ], 
        [
                       "q" => "The health of nations is more important than the wealth of nations.", 
                       "a" => "Will Rogers", 
                       "c" => "67", 
                       "h" => "<blockquote>&ldquo;The health of nations is more important than the wealth of nations.&rdquo; &mdash; <footer>Will Rogers</footer></blockquote>" 
        ]                                                                                                                                                    
     ];


    public function testGetQuotes(): void
    {
        $limit = 8;
        $zenQuotesService = new ZenQuotesService();
        $result = $zenQuotesService->getQuotes($limit);
        $this->assertCount($limit, $result);
        $this->assertIsArray($result);
        foreach ($result as $value) {
            $this->assertInstanceOf(QuoteServiceDto::class, $value);
            $this->assertIsString($value->getQuote());
        }
    }

    public function testMockNotQuotesReturn()
    {
        $streamMock = $this->getMockBuilder(StreamInterface::class)->getMock();
        $streamMock->method('getContents')->willReturn('[]');
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getStatusCode')->willReturn(200);
        $responseMock->method('getBody')->willReturn($streamMock);

        $ZenQuotemock = $this->createMock(ZenQuotesService::class);
        $ZenQuotemock->expects($this->any())->method('makeRequest')->willReturn($responseMock);

        $result = $ZenQuotemock->getQuotes(1);

        $this->assertEquals([], $result);
    }

}
