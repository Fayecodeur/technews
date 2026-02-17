<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
        'is_commentable',
        'is_shareable',
        'category_id',
        'author_id',

    ];

    public function getSlugOptions(): SlugOptions
    {
        return  SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function imageUrl(): string{
        return Storage::url($this->image);
    }
}
