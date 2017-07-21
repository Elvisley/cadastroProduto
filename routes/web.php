<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , 'ProdutoController@index')->name('produto.index');
Route::get('/produto' , 'ProdutoController@index')->name('produto.index');
Route::post('/produto/cadastrar' , 'ProdutoController@store')->name('produto.create');
Route::post('/produto/atualizar/{id}' , 'ProdutoController@update')->name('produto.update');
Route::get('/produto/remover/{id}' , 'ProdutoController@destroy')->name('produto.destroy');

