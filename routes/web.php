<?php


Route::view('/', 'authenticate.login')->name('login')->middleware('guest');

Route::post('/login', [
    'uses' => 'LoginController@autenticar', 
    'as'   => 'autenticar'
]);

Route::get('/logoff', [
    'uses' => 'LoginController@sair', 
    'as'   => 'sair'
]);


Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    
    Route::get('home', [
        'uses' => 'IndexController@index', 
        'as'   => 'home'
    ]);
    
    /*****************  Rota Empresas **************************************/
    Route::resource('empresas', 'EmpresaController');
    
    Route::get('pesquisar/empresas', [
        'uses' => 'EmpresaController@pesquisarEmpresa',
        'as'   => 'pesquisar.empresas'
    ]);
    
    Route::get('ajax/empresa', [
        'uses' => 'EmpresaController@ajax',
        'as'   => 'ajax.empresas'
    ]);
    
    
    


    /***************** Rota Fornecedores ************************************/
    Route::resource('fornecedores', 'FornecedorController');  
    
    Route::get('pesquisar/fornecedores', [
        'uses' => 'FornecedorController@pesquisarFornecedor',
        'as' => 'pesquisar.fornecedores'
    ]);

    Route::get('ajax/fornecedor', [
        'uses' => 'FornecedorController@ajax',
        'as'   => 'ajax.fornecedores'
    ]);

});



