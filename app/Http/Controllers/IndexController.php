<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmpresaRepository;
use App\Repositories\FornecedorRepository;

class IndexController extends Controller
{
    

    private $empresa;
    private $fornecedor;


    public function __construct(EmpresaRepository $empresaRepository, FornecedorRepository $fornecedorRepository)
    {
        $this->empresa    = $empresaRepository;
        $this->fornecedor = $fornecedorRepository;
    }
   


    /**
     * Retorna na view uma lista das ultimas(5) empresas Cadastradas
     */
    public function index()
    {

        $empresas     = $this->empresa->ultimosRegistro(5);
        $fornecedores = $this->fornecedor->ultimosRegistro(5);

        return view('index',[
            'empresas'     => $empresas,
            'fornecedores' => $fornecedores,
        ]);

    }




    /**
     *  retorna a view de opção de pesquisa para o usuário
     */
    public function pesquisa()
    {
        return view('home.pesquisar');
    }

    
}
