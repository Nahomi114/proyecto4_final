<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'ID_proveedores';
    protected $fillable = [
        'Nom_proveedores',
        'RUC_proveedores',
        'Telf_proveedores',
        'Correo_proveedores',
    ];

    // Relación uno a muchos con Ingresos
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'ID_proveedores', 'ID_proveedores');
    }
}
