<?php

namespace App\Repositories;

use App\Models\Empresa;
use Mockery\CountValidator\Exception;

class EmpresaRepository
{
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;    
    }


    public function todos()
    {
        return $this->empresa->orderBy('id', 'DESC')->get();
    }

    /**
     * Esse método retorna as cidades no formato 
     * para ser exibido em campos de Select nos 
     * formulários
     */
    public function todosParaBoxDeSelecao()
    {
        return $this->empresa->pluck('nome', 'id');
    }

    
    public function ultimosRegistro($quantidade)
    {
        return $this->empresa->orderBy('id', 'DESC')->take($quantidade)->get();
    }


    /**
     *  esse metodo exibe o relacionamento entre empresa e fornecedore
     */
    public function getById($id)
    {
        return $this->empresa->where('id', $id)
                             ->with('fornecedores')
                             ->get();
    }

    /**
     *  Metodo faz a busca e exibe o resultado conforme a quantidade
     *  informado pelo parametro $paginate
     */
    public function getByName($nome, $paginate)
    {
        return $this->empresa->where('nome', 'LIKE', "%".$nome."%")->paginate($paginate);
    }


    /**
     *  Metodo que retorna solicitação do DataTable
     */
    public function query()
    {   
        return Empresa::query();
    }



    public function add(array $data)
    {   
        try{
   
            return $this->empresa->create($data);

        } catch (Exception $ex) {

            return $this->exibirErro('cadastrar', $ex->getMessage);

        }
        
    }


    public function update($id, array $data)
    {
        try{
            $empresa = Empresa::find($id); 

            $empresa->uf = $data['uf'];
            $empresa->cnpj = $data['cnpj'];
            $empresa->nome = $data['nome'];
            
            return $empresa->save();

        } catch (Exception $ex) {

            return $this->exibirErro('atualizar', $ex->getMessage);

        }
        
    }

    
    public function delete($id)
    {  
        try{

            $empresa = Empresa::find($id);            
            return $empresa->delete();
            

        } catch (Exception $ex) {

            return $this->exibirErro('destroy', $ex->getMessage);

        }
       
    }

    private function exibirErro($acao, $erro)
    {
        return ['mensagem'  => 'Falha no Processamento ( '. $acao .' ): '.$erro];
    }



}