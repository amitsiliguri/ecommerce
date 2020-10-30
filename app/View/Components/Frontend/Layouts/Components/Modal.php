<?php

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id)
    {
        $this->_id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('frontend.layouts.components.modal');
    }
}
