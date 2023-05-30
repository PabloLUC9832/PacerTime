<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextArea extends Component
{

    public $name;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($name,$id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-text-area');
    }
}
