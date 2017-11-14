<?php

namespace Modules\Frontend\Entities;

use App\User;

class Event extends BaseModel
{
    use \Dimsav\Translatable\Translatable,
        \Spatie\Tags\HasTags;

    public $translatedAttributes = ['title', 'content', 'abstract', 'slug', 'organizer','location', 'lector','price'];

    protected $table = 'frontend_events';

    protected $fillable = [
        'author_id',
        'is_published',
        'cover_image',
        'price',
        'organizer',
        'lector',
        'held_at',
        'location',
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    protected $dates = [
        'held_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', '=', true);
    }

    public function scopeUpcoming($query){
        return $query->where('held_at','>',date('Y-m-d H:i:s'));
    }

    public function scopePast($query){
        return $query->where('held_at','<',date('Y-m-d H:i:s'));
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'frontend_events_categories');
    }

    public function scopeSearchByTag($query, $tag){

        if($tag != '' || $tag !== null){

            $query->where(function ($query) use ($tag){
                $query->withAnyTags([$tag]);
            });
        }

        return $query;
    }

    public function scopeSearchByCategory($query, $category){

        if($category != '' || $category !== null){

            $query->whereHas('categories', function ($query) use ($category) {
                $query->whereTranslation('slug', $category);
            });
        }

        return $query;
    }

    public function scopeSearchByKeyword($query, $keyword){

        if($keyword != '' || $keyword !== null){

            $query->where(function ($query) use ($keyword){
                $query->orWhereTranslationLike('title',sprintf('%%%s%%',$keyword))
                    ->orWhereTranslationLike('abstract',sprintf('%%%s%%',$keyword))
                    ->orWhereTranslationLike('content',sprintf('%%%s%%',$keyword));
            });
        }

        return $query;
    }
}
