<?php

namespace Modules\Blog\Tests\Unit;

use Tests\TestCase;
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Requests\BlogRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Blog\Models\Blog;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    // /** @test */
    public function it_can_create_a_blog_post_using_controller()
    {
        $data = [
            'title' => 'Test Blog Title',
            'content' => 'This is a test blog content.'
        ];

        // Manually validate the data
        $request = new BlogRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->fails(), 'Validation failed: ' . json_encode($validator->errors()));

        // Pass validated data to the controller
        $controller = new BlogController();
        $response = $controller->store(new Request($data));

        // Assert blog exists in database
        $this->assertDatabaseHas('blogs', [
            'title' => 'Test Blog Title',
            'content' => 'This is a test blog content.'
        ]);

        // Assert redirection after storing
        $this->assertEquals(302, $response->getStatusCode());
    }

    // /** @test */
    public function it_can_update_a_blog_post_using_controller()
    {
        $blog = Blog::factory()->create([
            'title' => 'Old Title',
            'content' => 'Old content'
        ]);

        $data = [
            'title' => 'Updated Blog Title',
            'content' => 'Updated content'
        ];

        // Manually validate the data
        $request = new BlogRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->fails(), 'Validation failed: ' . json_encode($validator->errors()));

        // Pass validated data to the controller
        $controller = new BlogController();
        $response = $controller->update(new Request($data), $blog);

        // Assert updated values in database
        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Blog Title',
            'content' => 'Updated content'
        ]);

        // Assert redirection after updating
        $this->assertEquals(302, $response->getStatusCode());
    }

    // /** @test */
    public function it_can_delete_a_blog_post_using_controller()
    {
        $blog = Blog::factory()->create();

        // Pass the Blog instance directly to the controller
        $controller = new BlogController();
        $response = $controller->destroy($blog);

        // Assert the blog post is deleted
        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);

        // Assert redirection after deleting
        $this->assertEquals(302, $response->getStatusCode());
    }
}
