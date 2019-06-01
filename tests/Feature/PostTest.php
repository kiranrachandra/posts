<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostTest extends TestCase {

    use WithoutMiddleware;
    
    public function testGettingAllPosts() {
        $response = $this->json('GET', '/posts');
        $response->assertStatus(200);

        $response->assertJsonStructure(
                [
                    [
                        'post_id',
                        'title',
                        'content'
                    ]
                ]
        );
    }

    public function testCreatePost() {
        $data = [
            'user_id' => 1,
            'title' => "test title",
            'content' => "test content",
        ];

        $response = $this->post('/post/store', $data);
        $response->assertStatus(201);
    }

    public function testUpdatePost() {
        $response = $this->json('GET', '/posts');
        $response->assertStatus(200);

        $post = $response->getData()[0];

        $update = $this->patch('/post/update', [
            'post_id' => $post->post_id,
            'title' => "update title testing.......",
            'content' => "update content testing......."
        ]);

        $update->assertStatus(202);
    }

    public function testDeletePost() {
        $response = $this->json('GET', '/posts');
        $response->assertStatus(200);

        $post = $response->getData()[0];

        $delete = $this->delete('/posts/' . $post->post_id);
        $delete->assertStatus(204);
    }

}
