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
     *  Formata a data de cadastro no padrão (dd/mm/YYYY)
     */
    public function getCreatedAtAttribute()
    {   
        $createdAt = explode(' ', $this->attributes['created_at']); 
        
        $dataCadastrada = explode('-', $createdAt[0]);

        $dataFormatada = $dataCadastrada[2] .'/'.$dataCadastrada[1] .'/'.$dataCadastrada[0]; 

        return $dataFormatada;

    }



    /**
     *  Formata a data de nascimento no padrão (dd/mm/YYYY)
     */
    public function getDataNascimentoAttribute()
    {
        $dataCadastrada = explode('-', $this->attributes['data_nascimento']);

        $dataNascimentoFormatada = $dataCadastrada[2] .'/'. $dataCadastrada[1] .'/'. $dataCadastrada[0]; 
        
        return $dataNascimentoFormatada;

    }
    


    /**
     * Relacionamento 1/1 (Fornecedor pertence a uma Empresa)
     */
    public function empresa() : BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }



}
