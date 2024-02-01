<?php

namespace Tests\Unit;

use App\Services\ZenQuotesService;
use PHPUnit\Framework\TestCase;

class ZenQuotesServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testGetQuotes(): void
    {
        $limit = 8;
        $zenQuotesService = new ZenQuotesService();
        $result = $zenQuotesService->getQuotes($limit);
        $this->assertCount($limit, $result);
    }
}
