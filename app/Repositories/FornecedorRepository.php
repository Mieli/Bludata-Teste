<?php

namespace App\Repositories;

use App\Models\Fornecedor;
use Yajra\Datatables\Datatables;

class FornecedorRepository
{


    private $fornecedor;



    public function __construct(Fornecedor $fornecedor)
    {

        $this->fornecedor = $fornecedor;

    }




    // dados usado na home do site
    public function ultimosRegistro($quantidade)
    {

        return $this->fornecedor->orderBy('id', 'DESC')
                                ->with('empresa')
                                ->take($quantidade)
                                ->get();

    }




    public function getId($id)
    {

        return $this->fornecedor->where('id', $id)
                                ->with('empresa')
                                ->get();

    }
    


 
     /**
     *  Metodo que retorna solicitação do DataTable
     */
    public function query()
    {

        return Fornecedor::query()->orderBy('id', 'DESC')->with('empresa');

    }




    public function create(array $data)
    {  

        return $this->fornecedor->create($data);

    }




    public function update($id, $data)
    {
       
        $fornecedor = Fornecedor::find($id); 

        $fornecedor->empresa_id             = $data['empresa_id'];
        $fornecedor->nome                   = $data['nome'];
        $fornecedor->cpf                    = $data['cpf'];
        $fornecedor->cnpj                   = $data['cnpj'];
        $fornecedor->rg                     = $data['rg'];
        $fornecedor->telefone_celular       = $data['telefone_celular'];
        $fornecedor->telefone_residencial   = $data['telefone_residencial'];
        $fornecedor->telefone_comercial     = $data['telefone_comercial'];
        $fornecedor->data_nascimento        = $data['data_nascimento'];      
        
        return $fornecedor->save();    
        
    }


    

    public function delete($id)
    {  
       
        $fornecedor = Fornecedor::find($id);            
        return $fornecedor->delete();
        
    }
}