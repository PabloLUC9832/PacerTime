<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputRadio extends Component
{

    //public $name;
    public $id;
    public $value;
    public $class;
    /**
     * Create a new component instance.
     */
    //public function __construct($name,$id,$value,$class)
    public function __construct($id,$value,$class)
    {
        //$this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-radio');
    }
}
