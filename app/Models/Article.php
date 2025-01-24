<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (!$article->slug) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
