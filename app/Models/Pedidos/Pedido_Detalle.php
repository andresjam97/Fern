<?php

namespace App\Models\Pedidos;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido_Detalle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the ped_cabeza that owns the Pedido_Detalle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ped_cabeza(): BelongsTo
    {
        return $this->belongsTo(Pedido_Cabeza::class, 'id_cabeza', 'id');
    }

    /**
     * Get the product that owns the Pedido_Detalle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id_producto', 'id');
    }
}
