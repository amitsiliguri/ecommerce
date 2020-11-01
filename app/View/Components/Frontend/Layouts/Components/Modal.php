<?php

declare(strict_types = 1);

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $_id;
    public $_isModalOpen;
    public $_isParsistant;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, bool $isModalOpen, bool $isParsistant)
    {
        $this->_id = $id;
        $this->_isModalOpen = $isModalOpen;
        $this->_isParsistant = $isParsistant;
        
        
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
