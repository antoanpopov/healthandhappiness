<?php

namespace Modules\Tag\Entities\Tag;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $table = 'core_tags_translations';
    public $timestamps = false;
    protected $fillable = ['slug', 'name'];
}
