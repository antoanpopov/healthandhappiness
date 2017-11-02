<?php

namespace Modules\Frontend\Entities;

use App\User;

class Post extends BaseModel
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title','content','abstract','slug'];

    protected $table = 'frontend_posts';

    protected $fillable = [
        'author_id',
        'is_published',
        'cover_image',
    ];

    protected $casts = [
      'is_published' => 'boolean'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', '=', true);
    }

}
