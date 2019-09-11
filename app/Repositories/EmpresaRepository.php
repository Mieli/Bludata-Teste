<?php

namespace App\Repositories;

use App\Models\Empresa;

class EmpresaRepository
{
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;    
    }


    public function pesquisarTodos()
    {
        return $this->empresa->orderBy('id', 'DESC')->get();
    }

    /**
     * Esse método retorna as cidades no formato 
     * para ser exibido em campos de Select nos 
     * formulários
     */
    public function pesquisaParaBoxDeSelecao()
    {
        return $this->empresa->pluck('nome', 'id');
    }

    
    public function ultimosRegistro($quantidade)
    {
        return $this->empresa->orderBy('id', 'DESC')
                             ->take($quantidade)
                             ->get();
    }


    /**
     *  esse metodo exibe o relacionamento entre empresa e fornecedore
     */
    public function getId($id)
    {
        return $this->empresa->where('id', $id)
                             ->with('fornecedores')
                             ->get();
    }


    /**
     *  Metodo que retorna solicitação do DataTable
     */
    public function query()
    {   
        return Empresa::query();
    }



    public function create(array $data)
    { 
       return $this->empresa->create($data);
    }


    public function update($id, array $data)
    {        
        $empresa = Empresa::find($id); 

        $empresa->uf    = $data['uf'];
        $empresa->cnpj  = $data['cnpj'];
        $empresa->nome  = $data['nome'];
        
        return $empresa->save();

    }

    
    public function delete($id)
    {  
        $empresa = Empresa::find($id);            
        return $empresa->delete();
       
    }

}