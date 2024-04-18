<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escala extends Model
{
    use HasFactory;
    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function incidencia()
    {
        return $this->belongsTo(Incidencias::class);
    }

    
    // protected static function boot()
    // {
    //     parent::boot();
    
    //     static::saved(function ($escala) {
            
    //         if ($escala->incidencia->status === 'resuelto') {
                
    //             $escala->incidencia->update(['status' => 'resuelto']);
    //         }
    //     });
    // }
    
}
