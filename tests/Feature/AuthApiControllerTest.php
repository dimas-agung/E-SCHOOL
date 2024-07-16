<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthApiControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testLoginSuccess(): void
    {

        // $user = User::find(1);
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $this->post('api/login', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ])->assertStatus(200);

        $this->assertAuthenticatedAs($user);
    }
    public function testGetUserLogin(): void
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response=$this->actingAs($user)->get(route('api.auth.getuserlogin'));

        $response->assertStatus(200);

    }
    public function testLogout(): void
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        Sanctum::actingAs($user, ['*']);
        // Act
        $response = $this->postJson(route('api.auth.logout'));

        // Assert
        // $response->assertStatus(200);
        $this->assertGuest();
    }
}
