<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\AuthTrait;

class MessageRequestTest extends TestCase
{

    /**
     * Authenticate trait
     */
    use AuthTrait;

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
