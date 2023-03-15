<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Category;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'slug', 'excerpt', 'author', 'category_id', 'cover_img'];

    use HasFactory;

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     *
     *
     * @from tags to post
     */

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
