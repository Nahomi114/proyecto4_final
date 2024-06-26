<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'ID_ventas';
    protected $fillable = [
        'ID_clientes',
        'user_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_venta',
        'impuesto_venta',
        'total',
        'Estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_clientes', 'ID_clientes');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

