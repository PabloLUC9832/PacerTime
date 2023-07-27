<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubEvento extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*
     * Función para saber el evento del subEvento dado.
     *
     */
    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    /**
     * Función para saber los competidores de un sub evento
     *
     * @return HasMany
     */

    public function competidores(): HasMany
    {
        return $this->hasMany(Competidor::class);
    }



}
