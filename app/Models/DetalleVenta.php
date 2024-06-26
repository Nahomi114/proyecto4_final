<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_ventas';
    protected $primaryKey = 'ID_det_ventas';
    protected $fillable = [
        'ID_productos',
        'ID_ventas',
        'cantidad',
        'precio',
        'descuento',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_productos', 'ID_producto');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_ventas', 'ID_ventas');
    }
}
