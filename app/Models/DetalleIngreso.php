<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_ingreso';

    protected $primaryKey = 'ID_det_ingreso';

    protected $fillable = [
        'ID_producto',
        'ID_ingreso',
        'cant_det_ingreso',
        'precio_det_ingreso'
    ];

    public function producto() {
        return $this->belongsTo(Producto::class, 'ID_producto');
    }

    public function ingreso() {
        return $this->belongsTo(Ingreso::class, 'ID_ingreso');
    }
}
