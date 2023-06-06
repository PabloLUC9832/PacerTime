<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $message;
    public $id;
    public $class;

    public function __construct($name,$message,$id,$class="")
    {
        $this->name = $name;
        $this->message = $message;
        $this->id = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-field');
    }
}
