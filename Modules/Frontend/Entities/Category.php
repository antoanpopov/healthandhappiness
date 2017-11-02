<?php

namespace Modules\Frontend\Entities;

use App\User;

class Category extends BaseModel
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title','content','abstract','slug'];

    protected $table = 'frontend_categories';

    protected $fillable = [
        'is_published',
        'cover_image',
    ];

    protected $casts = [
      'is_published' => 'boolean'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', '=', true);
    }

}
