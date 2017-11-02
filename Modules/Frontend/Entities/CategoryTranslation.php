<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;

    protected $table = 'frontend_categories_translations';
    public  $timestamps = false;

    public $fillable = ['title','content','abstract','slug'];

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
