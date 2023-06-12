<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubEvento extends Model
{
    use HasFactory;

    protected $guarded = [];

/*
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
*/
    /*
    public function eventos(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
    */


}
