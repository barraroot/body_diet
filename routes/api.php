<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('novo-carrinho', 'LojaApiController@novocarrinho');

Route::get('novo-carrinho-logado/{usuario}', 'LojaApiController@novocarrinhologado');

Route::post('add-item/{carrinho}', 'LojaApiController@formitemadd');

Route::get('calcula-carrinho/{carrinho}', 'LojaApiController@calculaCarrinho');

Route::get('removeritem/{carrinho}/{item}', 'LojaApiController@removeritem');