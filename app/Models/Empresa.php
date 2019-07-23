<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{   
    protected $table = 'empresas';

    protected $fillable = ['uf','nome','cnpj'];

    /**
     *  Relacionamento 1/N (Empresa tem Muitos Fornecedores)
     */
    public function fornecedores() : HasMany
    {
        return $this->hasMany(Fornecedor::class);
    }

}
