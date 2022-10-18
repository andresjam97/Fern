<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Stancl\Tenancy\Database\Models\Tenant;

class Empresa extends Tenant
{
    use HasFactory;

    protected $table = 'empresas';

    /**
     * Get all of the comments for the Empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'empresa_id', 'id');
    }

    /**
    * Tenant Configuration for using autoincrement ids
    */
    public function getIncrementing()
    {
        return true;
    }

    public static function getCustomColumns(): array
    {
     return [
        'id',
        'name'
     ];
    }
}
