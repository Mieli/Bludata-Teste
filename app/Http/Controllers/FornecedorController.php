<?php

namespace App\Http\Controllers;

use App\Repositories\FornecedorRepository;
use App\Repositories\EmpresaRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FornecedorController extends Controller
{   


    private $fornecedorRepository;
    private $empresaRepository;
    


    
    public function __construct(FornecedorRepository $fornecedorRepository, EmpresaRepository $empresaRepository)
    {
        $this->fornecedorRepository = $fornecedorRepository;
        $this->empresaRepository    = $empresaRepository;
 
    }





    public function index()
    {   
        return view('fornecedor.home');
    }





    public function pesquisarFornecedor()
    {    
        return view('fornecedor.pesquisa');
    }





    // metodo para preencher o Datatable da tela de pesquisa.
    public function ajax()
    { 
        return datatables()->eloquent($this->fornecedorRepository->query())
                           ->addIndexColumn()
                           ->addColumn('menu', 'fornecedor.actions') // mostrar botões no dataTable
                           ->rawColumns(['menu'])
                           ->make(true);
    }




    
    public function create()
    {   
        $empresas = $this->empresaRepository->pesquisaParaBoxDeSelecao();
        return view('fornecedor.cadastro',[
            'empresas' => $empresas,
        ]);
    }

    



    public function store(Request $request)
    {
        $request->validate([
            'nome'                  => 'required|min:5',
            'telefone_celular'      => 'required',
            'telefone_residencial'  => 'required',
            'telefone_comercial'    => 'required',
        ]);

        $dataRequest = $request->all();           
        /**
         *  Caso o fornecedor seja pessoa física, 
         * também é necessário cadastrar o RG e data de nascimento;
         * 
         */

        if($dataRequest['tipoPessoa'] == 'F'){

            if(is_null($dataRequest['rg'])){  // Validar RG

                    return redirect()->back()
                                    ->with('mensagem-danger', 'campo RG é obrigatório!')
                                    ->withInput();

            } elseif (is_null($dataRequest['data_nascimento'])) {  //Validar Data de Nascimento

                    return redirect()->back()
                                    ->with('mensagem-danger', 'O campo DATA NASCIMENTO é obrigatório')
                                    ->withInput();
            }
        }

        /** 
         *  Caso a empresa seja do Paraná, e o tipo da Pessoa é Física não permitir 
         * cadastrar um fornecedor pessoa física menor de idade
         */
        $empresa = $this->empresaRepository->getId($request['empresa_id']);

        if(($empresa[0]->uf == 'PR') && ($dataRequest['tipoPessoa'] == 'F')){
             
            $dataNascimentoFormatada = Carbon::parse($dataRequest['data_nascimento'])->format('d/m/Y');

            //verificar a idade do fornecedor (se for ( MENOR DE IDADE ) não realiza o cadastro)
            if( $this->calcularIdade( $dataNascimentoFormatada ) < 18 ){
                
                return redirect()->back()
                                ->with('mensagem-danger', 'O Cadastro de Pessoas Físicas menor de idade não permitido para empresas do Estado do Paraná!')
                                ->withInput();
            }
        }

       
    
        if($dataRequest['tipoPessoa'] == 'F'){
           $data = [
                'empresa_id'            => $dataRequest['empresa_id'],
                'nome'                  => $dataRequest['nome'],
                'cpf'                   => $dataRequest['cpf'],
                'cnpj'                  => $dataRequest['cnpj'],
                'rg'                    => $dataRequest['rg'],
                'telefone_celular'      => $dataRequest['telefone_celular'],
                'telefone_residencial'  => $dataRequest['telefone_residencial'],
                'telefone_comercial'    => $dataRequest['telefone_comercial'],
                'data_nascimento'       => $dataRequest['data_nascimento'],
            ]; 
        } else{
            //gera uma data padrão pra nao ficar em branco
            $now = Carbon::now();

            $data = [
                'empresa_id'            => $dataRequest['empresa_id'],
                'nome'                  => $dataRequest['nome'],
                'cpf'                   => $dataRequest['cpf'],
                'cnpj'                  => $dataRequest['cnpj'],
                'rg'                    => '',
                'telefone_celular'      => $dataRequest['telefone_celular'],
                'telefone_residencial'  => $dataRequest['telefone_residencial'],
                'telefone_comercial'    => $dataRequest['telefone_comercial'],
                'data_nascimento'       => $now,
            ];
        }

        try{

            $this->fornecedorRepository->create($data); 
                
            return redirect()->route('fornecedores.create')
                            ->with('mensagem-success', 'Cadastrado realizado com sucesso!'); 

        }catch(\Exception $e){

            return redirect()->back()->with('mensagem-danger', 'Houve um Problema: '. $e);

        }
    }



    /**
     *  Calcula a idade do fornecedor 
     */
     public function calcularIdade($dataNascimento){

        list($dia, $mes, $ano) = explode('/', $dataNascimento);      // Separa em dia, mês e ano
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));    // dia de hoje 
        $dataNascimento = mktime( 0, 0, 0, $mes, $dia, $ano);        // formata a data nascimento do fornecedor
         
        $idade = floor((((($hoje - $dataNascimento) / 60) / 60) / 24) / 365.25); // retorna a idade calculada
        
        return $idade;
    }




    
    public function show($id)
    {
        $fornecedor = $this->fornecedorRepository->getId($id);

        if(count($fornecedor) != 0){

            return view('fornecedor.detalhes', [
                'fornecedor' => $fornecedor,
            ]);

        }else{
            
            return redirect()->route('fornecedores.index')
                            ->with('mensagem-danger', 'Fornecedor não cadastrado no sistema!  ');

        } 
        
    }




   
    public function edit($id)
    {   
        $empresas = $this->empresaRepository->pesquisaParaBoxDeSelecao();
        $fornecedor = $this->fornecedorRepository->getId($id);

        if(count($fornecedor) != 0){

            return view('fornecedor.editar', [
                'empresas'   => $empresas,
                'fornecedor' => $fornecedor,
            ]);

        }else{

            return redirect()->route('fornecedores.index')
                             ->with('mensagem-danger', 'Fornecedor não cadastrado no sistema!  ');

        }
    }




    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'                  => 'required|min:5',
            'telefone_celular'      => 'required',
            'telefone_residencial'  => 'required',
            'telefone_comercial'    => 'required',
        ]);

        $dataRequest = $request->all();           
        /**
         *  Caso o fornecedor seja pessoa física, 
         * também é necessário cadastrar o RG e data de nascimento;
         * 
         */
        
        if($dataRequest['tipoPessoa'] == 'F'){

            if(is_null($dataRequest['rg'])){  // Validar RG

                    return redirect()->back()
                                    ->with('mensagem-danger', 'campo RG é obrigatório!')
                                    ->withInput();

            } elseif (is_null($dataRequest['data_nascimento'])) {  //Validar Data de Nascimento

                    return redirect()->back()
                                    ->with('mensagem-danger', 'O campo DATA NASCIMENTO é obrigatório')
                                    ->withInput();
            }
        }

        /** 
         *  Caso a empresa seja do Paraná, não permitir 
         * cadastrar um fornecedor pessoa física menor de idade
         */
        $empresa = $this->empresaRepository->getId($request['empresa_id']);

        if($empresa[0]->uf == 'PR'){
            //converte a $ para formato 
            $dataNascimentoFormatada = Carbon::parse($dataRequest['data_nascimento'])->format('d/m/Y');

            //verificar a idade do fornecedor (se for de "( MENOR )" não realiza o cadastro)
            if( $this->calcularIdade( $dataNascimentoFormatada ) < 18 ){
                
                return redirect()->back()
                                ->with('mensagem-danger', 'O Cadastro de Pessoas Físicas menor de idade não permitido para empresas do Estado do Paraná!')
                                ->withInput();
            }
        }

        //
        if($dataRequest['tipoPessoa'] == 'F'){
           $data = [
                'empresa_id'            => $dataRequest['empresa_id'],
                'nome'                  => $dataRequest['nome'],
                'cpf'                   => $dataRequest['cpf'],
                'cnpj'                  => $dataRequest['cnpj'],
                'rg'                    => $dataRequest['rg'],
                'telefone_celular'      => $dataRequest['telefone_celular'],
                'telefone_residencial'  => $dataRequest['telefone_residencial'],
                'telefone_comercial'    => $dataRequest['telefone_comercial'],
                'data_nascimento'       => $dataRequest['data_nascimento'],
            ]; 
        } else{
            //gera uma data padrão pra nao ficar em branco
            $now = Carbon::now();

            $data = [
                'empresa_id'            => $dataRequest['empresa_id'],
                'nome'                  => $dataRequest['nome'],
                'cpf'                   => $dataRequest['cpf'],
                'cnpj'                  => $dataRequest['cnpj'],
                'rg'                    => '',
                'telefone_celular'      => $dataRequest['telefone_celular'],
                'telefone_residencial'  => $dataRequest['telefone_residencial'],
                'telefone_comercial'    => $dataRequest['telefone_comercial'],
                'data_nascimento'       => $now,
            ];
        }

        try{

            $this->fornecedorRepository->update($id, $data);
                
            return redirect()->route('pesquisar.fornecedores')
                            ->with('mensagem-success', 'Atualização realizada com sucesso!'); 

        }catch(\Exception $e){

            return redirect()->back()->with('mensagem-danger', 'Houve um Problema: '. $e);

        }                    
    }




    
    public function destroy($id)
    {
        try{

            $this->fornecedorRepository->delete($id);
                
            return redirect()->route('fornecedores.create')
                             ->with('mensagem-success', 'Atualização realizada com sucesso!'); 

        }catch(\Exception $e){

            return redirect()->back()->with('mensagem-danger', 'Houve um Problema: '. $e);

        }
                             
    }


   
}
