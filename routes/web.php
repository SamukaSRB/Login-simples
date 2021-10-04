<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','usuarioControler@index');
Route::get('/cadastro_usuario','usuarioControler@login');
Route::post('/registrar_usuario','usuarioControler@registarUsuario');
Route::get('/recuperar_senha','usuarioControler@recuperarSenha');
Route::post('/executar_recuperar_senha','usuarioControler@executarRecuperarSenha');
Route::post('/logar_usuario','usuarioControler@logar');
Route::get('/logout_usuario','usuarioControler@Logout');
Route::get('/usuario_email_enviado','usuarioControler@emailEnviado');

//
Route::get('/dashboard','produtoControler@index');



//Produtos
Route::get('/admin','produtoControler@index')->name('product.admin');
Route::get('/show','produtoControler@show')->name('product.show');
Route::get('/create','produtoControler@create')->name('create.product');
Route::post('/store','produtoControler@store')->name('product.store');
Route::get('/edit/product/{id}','produtoControler@edit');
Route::post('/update/product/{id}','produtoControler@update');
Route::get('/delete/product/{id}','produtoControler@delete');

