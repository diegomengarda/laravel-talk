<?php

use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\{actingAs, get, post};

uses()->group('feature');

it('should list posts', function () {
    Post::factory()->count(3)->create();
    get('/api/posts')
        ->assertOk()
        ->assertJsonCount(3);
});

it('should authenticated user can create post', function () {
    $user = User::factory()->create();
    $payload = [
        'title' => 'Test Post',
        'content' => 'This is a sample post content with more than 10 characters.',
    ];
    actingAs($user)
        ->post('/api/posts', $payload)
        ->assertCreated()
        ->assertJsonFragment(['title' => 'Test Post']);
});
