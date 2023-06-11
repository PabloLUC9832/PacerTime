<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardEvento extends Component
{

    public $imagen;
    public $nombre;
    public $descripcion;

    /**
     * Create a new component instance.
     */
    public function __construct($imagen,$nombre,$descripcion)
    {
        //
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.card-evento');
    }
}
