<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_can_list_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_authenticated_user_can_create_post()
    {
        $user = User::factory()->create();

        $payload = [
            'title' => 'Test Post',
            'content' => 'This is a sample post content with more than 10 characters.',
        ];

        $response = $this->actingAs($user)->postJson('/api/posts', $payload);

        $response->assertStatus(201)->assertJsonFragment(['title' => 'Test Post']);
    }
}
