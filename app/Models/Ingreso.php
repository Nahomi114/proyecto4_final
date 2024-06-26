<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = 'ingresos';
    protected $primaryKey = 'ID_ingreso';
    protected $fillable = [
        'ID_proveedores',
        'user_id',
        'tipo_comprob',
        'serie_comprob',
        'num_comprob',
        'fec_ingreso',
        'impuesto',
        'total',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_proveedores', 'ID_proveedores');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $casts = [
        'fec_ingreso' => 'datetime',
    ];
}
