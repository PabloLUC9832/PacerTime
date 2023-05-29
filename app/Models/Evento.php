<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subEventos() : HasMany
    {
        return $this->hasMany(SubEvento::class);
    }



}
