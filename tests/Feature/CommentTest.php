<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * comments page is loading
     *
     * @return void
     */
    public function test_comments_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Test adding new comment through post url is working
     *
     * @return void
     */
    public function test_adding_comment_though_post_is_working()
    {
        $response = $this->post('/comments', [
            'author' => 'author',
            'content' => 'content',
            'reply_id' => 1
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test new comment fields validation before adding to db
     *
     * @return void
     */
    public function test_add_comment_validation_working()
    {
        $response = $this->post('/comments', [
            'reply_id' => 1
        ]);

        $response->assertInvalid(['author', 'content']);
    }
}
