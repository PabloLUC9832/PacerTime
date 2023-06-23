<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TimePicker extends Component
{

    public $name;
    public $message;
    public $required;
    public $valueHora;
    public $valueMinuto;
    public $valuePeriodo;
    /**
     * Create a new component instance.
     */
    public function __construct($name,$message,$required="",$valueHora="",$valueMinuto="",$valuePeriodo="")
    {
        $this->name = $name;
        $this->message = $message;
        $this->required = $required;
        $this->valueHora = $valueHora;
        $this->valueMinuto = $valueMinuto;
        $this->valuePeriodo = $valuePeriodo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.time-picker');
    }
}
