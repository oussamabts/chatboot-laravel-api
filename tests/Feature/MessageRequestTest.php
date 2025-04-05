<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class MessageRequestTest extends TestCase
{
    public function authenticate()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        return $user;
    }

    /**
     * Refresh Database
     */
    use RefreshDatabase;

    /**
     * Test Store Message
     */
    public function testStoreMessage()
    {
        $this->authenticate();

        $user = User::factory()->create();

        $message = Message::factory()->create([
            "user_id" => $user->id
        ]);

        $request = [
            'message' => $message->first()->message,
            "user_id" => $user->id
        ];

        $response = $this->post('api/auth/messages', $request);

        $response->assertStatus(201);
    }
}
