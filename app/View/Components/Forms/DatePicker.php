<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePicker extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $message;
    public $required;
    public $value;

    public function __construct($name,$message,$required="",$value="")
    {
        $this->name = $name;
        $this->message = $message;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.date-picker');
    }
}
