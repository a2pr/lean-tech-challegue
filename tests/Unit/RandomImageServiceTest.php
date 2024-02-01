<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\RandomImageService;

class RandomImageServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testGetRandomImageReturnsLink(): void
    {
        $randomImageService = new RandomImageService();
        $result = $randomImageService->getRandomImage();
        $this->assertNotTrue(empty($result));
        
    }
}
