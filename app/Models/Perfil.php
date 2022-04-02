<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

// Relación 1:1 de perfil con usuario
// Ejemplo: Perfil::find(1) -> nos retorna la información del usuario
