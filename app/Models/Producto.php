<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'ID_producto';

    protected $fillable = [
        'ID_categorias',
        'Cod_Barra_producto',
        'Nom_producto',
        'Precio_producto',
        'Cantida_producto',
        'Img_producto',
        'Stock_producto',
        'Desc_producto',
        'Estado_producto'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_categorias');
    }

    public function detallesIngreso(): HasMany
    {
        return $this->hasMany(DetalleIngreso::class, 'ID_producto');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($producto) {
            // Verificar si el producto tiene detalles de ingreso asociados
            if ($producto->detallesIngreso()->exists()) {
                throw new \Exception("No se puede eliminar el producto porque tiene detalles de ingreso asociados.");
            }
        });
    }
}
