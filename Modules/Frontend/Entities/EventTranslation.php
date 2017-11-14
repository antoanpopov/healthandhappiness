<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use \Cviebrock\EloquentSluggable\Sluggable;

    protected $table = 'frontend_events_translations';
    public  $timestamps = false;

    public $fillable = ['title','content','abstract','slug', 'organizer','location'];

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
