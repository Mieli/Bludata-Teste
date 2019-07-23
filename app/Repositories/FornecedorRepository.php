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

    public function todos()
    {
        return $this->fornecedor->orderBy('id', 'DESC')
                                ->with('empresa')
                                ->get();
    }

    public function todosComPaginacao($paginacao)
    {
        return $this->fornecedor->orderBy('id', 'DESC')
                                ->with('empresa')
                                ->paginate($paginacao);
    }

    public function ultimosRegistro($quantidade)
    {
        return $this->fornecedor->orderBy('id', 'DESC')
                                ->with('empresa')
                                ->take($quantidade)
                                ->get();
    }

    public function getById($id)
    {
        return $this->fornecedor->where('id', $id)
                                ->with('empresa')
                                ->get();
    }
    
    public function getByName($name)
    {
        return $this->fornecedores->where('nome', 'LIKE', "%".$name."%")->get();
    }

     /**
     *  Metodo que retorna solicitação do DataTable
     */
    public function query()
    {
        return Fornecedor::query()->with('empresa');
    }


    public function add(array $data)
    {   
        try{
            
            return $this->fornecedor->create($data);

        } catch (Exception $ex) {

            return $this->exibirErro('cadastrar', $ex->getMessage);

        }        
    }

    public function update($id, $data)
    {
        try{

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

        } catch (Exception $ex) {

            return $this->exibirErro('atualizar', $ex->getMessage);

        }        
        
    }

    public function delete($id)
    {  
        try{

            $fornecedor = Fornecedor::find($id);            
            return $fornecedor->delete();
            

        } catch (Exception $ex) {

            return $this->exibirErro('destroy', $ex->getMessage);

        }
       
    }

    private function exibirErro($acao, $erro)
    {
        return ['mensagem'  => 'Falha no Processamento ( '. $acao .' ): '.$erro];
    }


}