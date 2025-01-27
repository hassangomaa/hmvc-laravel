<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Blog\Database\Factories\BlogPostFactory;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'content']; // Add the fields you want to allow mass assignment

    // protected static function newFactory(): BlogPostFactory
    // {
    //     // return BlogPostFactory::new();
    // }
}
