<?php

namespace Modules\Frontend\Composers;

use Illuminate\View\View;
use Spatie\Tags\Tag;

class PostsTagsViewComposer
{

    /**
     * @var Tag $tag
     */
    protected $tag;

    /**
     * TagsViewComposer constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function compose(View $view)
    {
        $view->with('tags', $this->tag::all());
    }
}
