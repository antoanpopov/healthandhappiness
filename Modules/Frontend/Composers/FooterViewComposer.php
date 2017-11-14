<?php

namespace Modules\Frontend\Composers;

use Illuminate\View\View;
use Modules\Frontend\Entities\Category;
use Spatie\Tags\Tag;

class FooterViewComposer
{

    protected $categories;

    /**
     * TagsViewComposer constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function compose(View $view)
    {
        $view->with('data',['categories' => $this->categories::all()]);
    }
}
