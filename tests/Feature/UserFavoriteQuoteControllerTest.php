<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserFavoriteQuoteControllerTest extends TestCase
{

    public function testFavoriteQuotesReturnsOkForLoginUsers(): void
    {
        
        $user = User::factory()->create();
        $response = $this
        ->actingAs($user)
        ->get('/favorite-quotes');

        $response->assertOk();
    }

    public function testReporFavoriteQuotesReturnsOkForLoginUsers(): void
    {
        $user = User::factory()->create();
        $response = $this
        ->actingAs($user)
        ->get('/report-favorite-quotes');

        $response->assertOk();
    }

    public function testFavoriteQuotesRedirectsToQuotesRouteForUnauthenticatedUsers():void {

        $response = $this->get('/favorite-quotes');

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/quotes');
    }

    public function testReporFavoriteQuotesRedirectsToQuotesRouteForUnauthenticatedUsers():void {

        $response = $this->get('/report-favorite-quotes');

        $response->assertSessionHasNoErrors()
            ->assertRedirect('/quotes');
    }
}
