<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardEvento extends Component
{

    public $imagen;
    public $nombre;
    //public $descripcion;
    public $fechaInicioEvento;
    public $fechaFinEvento;
    public $lugarEvento;
    public $horaEvento;

    /**
     * Create a new component instance.
     */
    //public function __construct($imagen,$nombre,$descripcion,$fechaInicioEvento,$fechaFinEvento,$lugarEvento,$horaEvento)
    public function __construct($imagen,$nombre,$fechaInicioEvento,$fechaFinEvento,$lugarEvento,$horaEvento)
    {
        //
        $this->imagen = $imagen;
        $this->nombre = $nombre;
        //$this->descripcion = $descripcion;
        $this->fechaInicioEvento = $fechaInicioEvento;
        $this->fechaFinEvento = $fechaFinEvento;
        $this->lugarEvento = $lugarEvento;
        $this->horaEvento = $horaEvento;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.card-evento');
    }
}
