<?php

namespace Tests\Feature;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{

    public function testQuotesRoute():void{
        Quote::truncate();
        $response = $this->get('/quotes');

        $response->assertOk();
        $count = Quote::count();
        $this->assertEquals(5,$count);
    }

    public function testQuotesNewRoute():void{
        Quote::truncate();
        $response = $this->get('/quotes');

        $response->assertOk();

        $response = $this->get('/quotes/new');

        $response->assertOk();

        $count = Quote::count();
        $this->assertEquals(10,$count);
    }

    public function testSecureQuotesRoute():void{
        Quote::truncate();

        $user = User::factory()->create();
        $response = $this
        ->actingAs($user)
        ->get('/secure-quotes');

        $response->assertOk();
        $count = Quote::count();
        $this->assertEquals(10,$count);
    }

    public function testSecureQuotesRouteRedirectToQuote():void
    {
        $response = $this->get('/secure-quotes');

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/quotes');
            //need work
    }
}
