<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * Get all of the pedido_detalle for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedido_detalles(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_producto', 'id');
    }

    /**
     * Get all of the prices for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'id_product', 'id');
    }
}
