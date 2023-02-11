<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * Con $guarded se permite la asignación masiva de todos los atributos
     * Con $fillable se especifican los atributos a los cuales se permitira la asignación masiva
     * @var array
     */
    //protected  $guarded = [];
    protected $fillable = [

        'nombre',
        'descripcion',
        'lugarEvento',
        'fechaInicioEvento',
        'fechaFinEvento',
        'horaEvento',
        'lugarEntregaKits',
        'fechaInicioEntregaKits',
        'fechaFinEntregaKits',
        'horaInicioEntregaKits',
        'horaFinEntregaKits',
        'imagen',

    ];

}
