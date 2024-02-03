<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class QuoteApiControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        Quote::truncate();
    }

    public function testQuoteReturns200(): void
    {

        $response = $this->get('/api/quotes');

        $response->assertStatus(200);
        $count = Quote::count();
        $this->assertEquals(5,$count);
    }

    public function testQuoteNewReturns200(): void
    {
        $response = $this->get('/api/quotes/new');

        $response->assertStatus(200);
        $count = Quote::count();
        $this->assertEquals(5,$count);
    }

    public function testSecureQuotesReturns401(){
        $response = $this->get('/api/secure-quotes'); 
        $response->assertStatus(401);
    }

    public function testSecureQuotesNewReturns401(){
        $response = $this->post('/api/secure-quotes/new'); 
        $response->assertStatus(401);
    }

    public function testSecureQuotesReturns200(){

        [$token, $user_id] = $this->getUserAndToken();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
            ])->get('/api/secure-quotes');

        
        $response->assertStatus(200);
        $count = Quote::count();
        $this->assertEquals(10,$count);

        User::destroy([$user_id]);
    }

    public function testSecureQuotesNewReturns200(){

        [$token, $user_id] = $this->getUserAndToken();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json'
            ])->post('/api/secure-quotes/new');

        
        $response->assertStatus(200);
        $count = Quote::count();
        $this->assertEquals(10,$count);

        User::destroy([$user_id]);
    }

    public function getUserAndToken(){

        $pass = '$$@@'.rand(10000,20000);
        $user = User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make($pass),
        ]);

        $response = $this->post('/api/token', ['email' => $user->email, 'password'=>$pass, 'device_name'=>'test']);
        return [$response->getContent(), $user->id];
    }
}
