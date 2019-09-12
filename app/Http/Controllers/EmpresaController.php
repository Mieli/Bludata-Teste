<?php

namespace App\Http\Controllers;

use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;



class EmpresaController extends Controller
{

    private $repository;




    public function __construct(EmpresaRepository $repository)
    {
        $this->repository = $repository;
    }





    public function index()
    {   
        return view('empresa.home');
    }





    public function create()
    {
        return view('empresa.cadastro',[            
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

       try{

            $this->repository->create($request->all());

            return redirect()->route('empresas.create')
                            ->with('mensagem-success', 'Cadastro realizado com sucesso!'); 

       }catch( Exception $e ){

            return redirect()->route('empresas.create')
                             ->with('mensagem-danger', 'Houve um Problema: '. $e);

       }
    }





    public function show($id)
    {
        $empresa = $this->repository->getId($id);
        
        if(count($empresa) != 0){

            return view('empresa.detalhes',[
                'empresa' => $empresa,
                'estados' => $this->getEstados()
            ]);

        }else{
           
            return redirect()->route('empresas.index')
                             ->with('mensagem-danger', 'Empresa não cadastrada no sistema!  ');

        }        
        
    }




 
    public function edit($id)
    {
        $empresa = $this->repository->getId($id);
        
        if(count($empresa) != 0){
                
            return view('empresa.editar',[
                'empresa' => $empresa,
                'estados' => $this->getEstados()
            ]);

        }else{
            
            return redirect()->route('empresas.index')
                             ->with('mensagem-danger', 'Empresa não cadastrada no sistema!  ');

        }
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'uf'     => 'required',
            'cnpj'   => 'required',
            'nome'   => 'required|min:5',
        ]);

        try{

            $this->repository->update($id, $request->all());

            return redirect()->route('empresas.index')
                             ->with('mensagem-success', 'Alteração realizada com sucesso!'); 

        }catch(\Exception $e){

            return redirect()->route('empresas.index')
                             ->with('mensagem-danger', 'Houve um Problema: '. $e);
                             
        }
    }




    public function destroy($id)
    {
       try{

            $this->repository->delete($id);
            
            return redirect()->route('pesquisar.empresas')
                         ->with('mensagem-danger', 'Exclusão realizada com sucesso!');

       }catch(\Exception $e){

            return redirect()->back()->with('mensagem-danger', 'Houve um Problema: '. $e);

       }
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
                    ->addColumn('menu', 'empresa.actions') // mostrar os botões no dataTable
                    ->rawColumns(['menu'])
                    ->make(true);
    }




    public function getEstados()
    {
        return  ['AC'=>'AC',
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
