<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    /*
     * Función para saber cuales son los subeventos que pertenecen al evento
     */
    public function subEventos(): HasMany
    {
        return $this->hasMany(SubEvento::class);
    }

    /**
     * Función para saber los competidores de un evento dado.
     * Sin necesidad de darle el sub evento
     *
     * @see https://youtu.be/5s-_SnVl-1g
     * @see https://laravel.com/docs/10.x/eloquent-relationships#has-many-through
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function competidores()
    {
        return $this->hasManyThrough(Competidor::class,SubEvento::class);
    }


}
