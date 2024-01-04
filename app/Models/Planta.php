<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $fillable = [
        'SKU',
        'Nombre',
        'Tipo_Planta',
        'Descripción',
        'Foto_path',
        'ID_Categoria',
        'Cuidados',
    ];

    // Relación con la tabla 'categorias'
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_Categoria');
    }
}

