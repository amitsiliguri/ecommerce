<?php

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

class RightSideNavigation extends Component
{
    public $_triggericon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($triggericon)
    {
        $this->_triggericon = $triggericon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('frontend.layouts.components.right-side-navigation');
    }
}
