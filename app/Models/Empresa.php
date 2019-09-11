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
     *  Formata a data de cadastro no padrão (dd/mm/YYYY)
     */
    public function getCreatedAtAttribute()
    {   
        // divide a timestamp em um array com 2 posições, (DATA posição 0 e HORA posição 1)
        $createdAt = explode(' ', $this->attributes['created_at']); 
        
        $dataCadastrada = explode('-', $createdAt[0]);

        $dataFormatada = $dataCadastrada[2] .'/'.$dataCadastrada[1] .'/'.$dataCadastrada[0]; 

        return $dataFormatada;
    }



    
    /**
     *  Relacionamento 1/N (Empresa tem Muitos Fornecedores)
     */
    public function fornecedores() : HasMany
    {
        return $this->hasMany(Fornecedor::class);
    }

}
