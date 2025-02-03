<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Blog\Database\Factories\BlogFactory;
use Modules\Blog\Models\Blog;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        //call the blog factory
        
        Blog::factory()->count(3)->create();
    }
}
