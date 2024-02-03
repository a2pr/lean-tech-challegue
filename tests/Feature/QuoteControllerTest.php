<?php

namespace Tests\Feature;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        Quote::truncate();
    }

    public function testQuotesRoute():void{
        $response = $this->get('/quotes');

        $response->assertOk();
        $count = Quote::count();
        $this->assertEquals(5,$count);
    }

    public function testQuotesRouteRedirectSecureQuote():void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/quotes')->assertRedirect('/secure-quotes');
    }

    public function testQuotesNewRoute():void
    {
        $response = $this->get('/quotes');

        $response->assertOk();

        $response = $this->get('/quotes/new');

        $response->assertOk();

        $count = Quote::count();
        $this->assertEquals(10,$count);
    }

    public function testSecureQuotesRoute():void
    {
        $user = User::factory()->create();
        $response = $this
        ->actingAs($user)
        ->get('/secure-quotes');

        $response->assertOk();
        $count = Quote::count();
        $this->assertEquals(10,$count);
    }

    public function testSecureQuotesNewRoute():void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/secure-quotes');

        $response->assertOk();

        $response = $this->get('/secure-quotes/new');
        $response->assertOk();

        $count = Quote::count();
        $this->assertEquals(20,$count);
    }

    public function testSecureQuotesRouteRedirectToQuote():void
    {
        $response = $this->get('/secure-quotes');

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/quotes');
    }

    public function testSecureQuotesNewRouteRedirectToQuote():void
    {
        $response = $this->get('/secure-quotes/new');

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/quotes');
    }
}
