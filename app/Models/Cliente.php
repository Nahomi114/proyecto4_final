<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    
    protected $table = 'clientes';
    protected $primaryKey = 'ID_clientes';
    protected $fillable = [
        'Nom_cliente',
        'Ape_cliente',
        'Tipo_documento',
        'DNI_cliente',
        'Cel_cliente',
        'Correo_cliente',
    ];

    public function ventas(): HasMany
    {
        return $this->hasMany(Venta::class, 'ID_clientes');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($cliente) {
            // Verificar si el cliente tiene ventas asociadas
            if ($cliente->ventas()->exists()) {
                throw new \Exception("No se puede eliminar el cliente porque está relacionado en cascada con ventas.");
            }
        });
    }
}
