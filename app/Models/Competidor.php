<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competidor extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Función para saber el sub evento de un competidor dado
     *
     * @return BelongsTo
     */
    public function sub_evento(): BelongsTo
    {
        return $this->belongsTo(SubEvento::class);
    }

}
