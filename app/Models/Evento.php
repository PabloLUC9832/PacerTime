<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*
     * Función para saber cuales son los subeventos que pertenecen al evento
     */
    public function subEventos(): HasMany
    {
        return $this->hasMany(SubEvento::class);
    }



}
