<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
    protected $fillable = [
    'titulo',
    'descripcion',
    'estado',
    'autor',
    'categoria_id'
    ];

    public function categoria(): BelongsTo
        {
        return $this->belongsTo(Categoria::class);
        }
}
