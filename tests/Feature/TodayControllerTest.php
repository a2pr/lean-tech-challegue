<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Quote;
use Tests\TestCase;

class TodayControllerTest extends TestCase
{

    protected function tearDown(): void
    {
        Quote::truncate();
    }

    public function testTodayRoute(){
        $response = $this->get('/today');

        $response->assertOk();
        $count = Quote::count();
        $this->assertEquals(1,$count);
    }

    public function testTodayNewRoute():void{
        $response = $this->get('/today');

        $response->assertOk();

        $response = $this->get('/today/new');

        $response->assertOk();

        $count = Quote::count();
        $this->assertEquals(2,$count);
    }
}
