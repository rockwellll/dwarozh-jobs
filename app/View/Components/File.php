<?php

namespace App\View\Components;

use Illuminate\View\Component;

class File extends Component
{
    public $label;
    public $buttonLabel;
    public $emptyStateText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $buttonLabel, $emptyStateText)
    {
        $this->label = $label;
        $this->buttonLabel = $buttonLabel;
        $this->emptyStateText = $emptyStateText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.file');
    }
}
