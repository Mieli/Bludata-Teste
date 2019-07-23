<?php

namespace App\Repositories;

use App\Models\Telefone;

class TelefoneRepository
{

 
    public function add($fornecedores_id, $data)
    {   
        try{   
                   
            for($i = 0; $i < count($data); $i++) {
               
                Telefone::create([
                    'fornecedores_id' => $fornecedores_id,
                    'telefone'        => $data[$i],
                ]);            
            }
            return true;
           
        } catch (Exception $ex) {

            return $this->exibirErro('cadastrar', $ex->getMessage);

        }        
    }

    public function update($id, $data)
    {
        try{
            $telefone = Telefone::find($id); 

            $telefone->fornecedores_id  = $data['fornecedores_id'];
            $telefone->telefone         = $data['telefone'];
            
            return $telefone->save();

        } catch (Exception $ex) {

            return $this->exibirErro('atualizar', $ex->getMessage);

        }        
        
    }

    public function delete($id)
    {  
        try{

            $telefone = Telefone::find($id);            
            return $telefone->delete();
            

        } catch (Exception $ex) {

            return $this->exibirErro('destroy', $ex->getMessage);

        }
       
    }

}