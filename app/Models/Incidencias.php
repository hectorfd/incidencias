<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

}
