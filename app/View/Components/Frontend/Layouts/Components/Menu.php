<?php

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

use App\Models\Catalog\Category;
use Illuminate\Support\Collection;

class Menu extends Component
{
    public $_productCategory;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $productCategory)
    {
        $this->_productCategory = $productCategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('frontend.layouts.components.menu');
    }

    public function getMenu()
    {
        $new = [];
        $Categories = $this->_productCategory->orderBy('sort_order', 'ASC')->where('status', 1)->select('id', 'title', 'slug', 'parent_id')->get()->toArray();
        if (sizeof($Categories) > 0) {
            foreach ($Categories as $Category){
                $new[$Category['parent_id']][] = $Category;
            }
        }
        return $new;
    }
}
