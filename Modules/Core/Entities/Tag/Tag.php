<?php

namespace Modules\Core\Entities\Tag;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $table = 'core_tags';
    public $translatedAttributes = ['slug', 'name'];
    protected $fillable = ['slug', 'name'];
}
