<?php

namespace Modules\Blog\Tests\Unit;

use Modules\Blog\Models\Blog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    // use RefreshDatabase; 

    public function test_blog_factory_creates_valid_model()
    {
        $blog = Blog::factory()->create();

        $this->assertInstanceOf(Blog::class, $blog);
        $this->assertNotEmpty($blog->title);
        $this->assertNotEmpty($blog->content);
    }

    public function test_blog_can_be_created()
    {
        $blog = Blog::create([
            'title' => 'Test Blog',
            'content' => 'This is a test blog content.'
        ]);

        $this->assertDatabaseHas('blogs', [
            'title' => 'Test Blog',
            'content' => 'This is a test blog content.'
        ]);
    }

    public function test_blog_can_be_updated()
    {
        $blog = Blog::factory()->create();

        $blog->update(['title' => 'Updated Title']);

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Title'
        ]);
    }

    public function test_blog_can_be_deleted()
    {
        $blog = Blog::factory()->create();

        $blog->delete();

        $this->assertDatabaseMissing('blogs', [
            'id' => $blog->id
        ]);
    }
}
