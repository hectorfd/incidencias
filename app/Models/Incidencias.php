<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket',
        'problem',
        'description',
        'numero_boleta',
        'fecha_boleta',
        'status', 
        'empleado_id',
        'cliente_id',
        'categoria_id',
    ];

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

    public function escalas()
    {
        return $this->hasMany(Escala::class);
    }

   

}
