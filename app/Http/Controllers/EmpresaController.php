<?php

namespace App\Http\Controllers;

use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;


class EmpresaController extends Controller
{

    private $repository;

    public function __construct(EmpresaRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {   
        $empresas = $this->repository->todos();

        return view('empresa.home', [
            'empresas' => $empresas,
            'estados' => $this->getEstados(),
        ]);
    }


    public function create()
    {
        $empresas = $this->repository->todos();

        return view('empresa.cadastro',[
            'empresas' => $empresas,
            'estados' => $this->getEstados()
        ]);
    }


    public function store(Request $request)
    {
       $request->validate([
           'uf'     => 'required',
           'cnpj'   => 'required',
           'nome'   => 'required|min:5',
       ]);

        $empresa = $this->repository->add($request->all());

        return redirect()->route('empresas.create')
                         ->with('mensagem-success', 'Cadastrado realizado com sucesso!'); 

    }


    public function show($id)
    {
        $empresa = $this->repository->getById($id);

        return view('empresa.detalhes',[
            'empresa' => $empresa,
            'estados' => $this->getEstados()
        ]);
    }

 
    public function edit($id)
    {
        $empresa = $this->repository->getById($id);
        
        return view('empresa.editar',[
            'empresa' => $empresa,
            'estados' => $this->getEstados()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uf'     => 'required',
            'cnpj'   => 'required',
            'nome'   => 'required|min:5',
        ]);

        $this->repository->update($id, $request->all());
        return redirect()->route('empresas.index')
                         ->with('mensagem-success', 'Atualização realizada com sucesso!'); 

    }


    public function destroy($id)
    {
      
        $this->repository->delete($id);
        return redirect()->route('empresas.index')
                         ->with('mensagem-danger', 'Exclusão realizada com sucesso!');

    }

    public function pesquisarEmpresa()
    {   
        return view('empresa.pesquisa');
    }

    // metodo para preencher o Datatable da tela de pesquisa.
    public function ajax()
    {
        return datatables()->eloquent($this->repository->query())
                    ->addIndexColumn()
                    ->addColumn('menu', 'empresa.actions')
                    ->rawColumns(['menu'])
                    ->make(true);
    }

    


    public function pesquisarFornecedoresDaEmpresa()
    {          
        return view('empresa.pesquisa-fornecedores-da-empresas');
    }

    public function getEstados()
    {
        return  $uf = [
            'AC'=>'AC',
            'AL'=>'AL',
            'AP'=>'AP',
            'AM'=>'AM',
            'BA'=>'BA',
            'CE'=>'CE',
            'DF'=>'DF',
            'ES'=>'ES',
            'GO'=>'GO',
            'MA'=>'MA',
            'MT'=>'MT',
            'MS'=>'MS',
            'MG'=>'MG',
            'PA'=>'PA',
            'PB'=>'PB',
            'PR'=>'PR',
            'PE'=>'PE',
            'PI'=>'PI',
            'RJ'=>'RJ',
            'RN'=>'RN',
            'RS'=>'RS',
            'RO'=>'RO',
            'RR'=>'RR',
            'SC'=>'SC',
            'SP'=>'SP',
            'SE'=>'SE',
            'TO'=>'TO',
        ];
    }
}
