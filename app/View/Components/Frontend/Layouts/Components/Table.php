<?php

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $_headers;
    public $_tableData;
    public $_actionColumn;
    public $_encoded_headers;  // for mock
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $headers, array $tableData, array $actionColumn)
    {
        $this->_headers = $headers;
        $this->_tableData = json_encode($tableData);
        $this->_encoded_headers = json_encode($headers);
        $this->_actionColumn = json_encode($actionColumn);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('frontend.layouts.components.table');
    }

}
