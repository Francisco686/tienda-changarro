<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 *
 * @property int $id
 * @property int $cantidad_entradas
 * @property int $id_producto
 * @property int $id_proveedor
 * @property float $precio_unitario
 * @property float $total
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @package App\Models
 */
class Entrada extends Model
{
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cantidad_entradas',
        'id_producto',
        'id_proveedor',
        'precio_unitario',
        'total',
    ];

    /**
     * Get the producto associated with the entrada.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    /**
     * Get the proveedor associated with the entrada.
     */
    public function proveedor()
    {
        return $this->belongsTo(Provedor::class, 'id_proveedor');
    }
}
