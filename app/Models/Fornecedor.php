<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Empresa;



class Fornecedor extends Model
{   
    protected $table = 'fornecedores';
    
    protected $fillable = [
        'empresa_id', 
        'nome',
        'cpf', 
        'cnpj', 
        'rg', 
        'telefone_celular',
        'telefone_residencial',
        'telefone_comercial',
        'data_nascimento',
    ];

    /**
     * Relacionamento 1/1 (Fornecedor pertence a uma Empresa)
     */
    public function empresa() : BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }



}
