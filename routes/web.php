<?php
use Illuminate\Support\Facades\Route;

Route::get('painel/produtos/testes','Painel\ProdutoController@testes');
Route::resource('/painel/produtos','Painel\ProdutoController');

Route::group(['namespace' => 'Site'],function(){
    Route::get('/categoria2/{id?}','SiteController@categoriaOp');
    Route::get('/categoria/{id}','SiteController@categoria');
    Route::get('/contato','SiteController@contato');
    Route::get('/','SiteController@index');
});
