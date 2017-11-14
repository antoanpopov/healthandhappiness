<?php

namespace Modules\Frontend\Composers;

use Illuminate\View\View;
use Modules\Frontend\Entities\Category;
use Spatie\Tags\Tag;

class PostsCategoriesViewComposer
{

    /**
     * @var Tag $tag
     */
    protected $category;

    /**
     * TagsViewComposer constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->category::all());
    }
}
