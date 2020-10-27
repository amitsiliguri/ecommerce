<?php

namespace App\View\Components\Frontend\Layouts\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $_headers;
    public $_tableData;
    public $_encoded_headers;  // for mock
    public $_table_name;
    public $_template_path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $templatePath = null, 
        string $tableName, 
        array $headers, 
        array $tableData
    )
    {
        $this->_headers = $headers;
        $this->_tableData = json_encode($tableData);
        $this->_encoded_headers = json_encode($headers);
        $this->_table_name = $tableName;
        $this->_template_path = $templatePath;
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
