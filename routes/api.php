<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    // Listar todas as cidades
    Route::get('/getCidades', 'App\Http\Controllers\CityController@getCidades');

    // Listar todos os produtos
    Route::get('/getProdutos', 'App\Http\Controllers\ProductController@getProdutos');

    // Buscar produto por id
    Route::get('/getProduto/{id}', 'App\Http\Controllers\ProductController@getProduto');

    // Adicionar produto
    Route::post('/addProduto', 'App\Http\Controllers\ProductController@addProduto');

    // Deletar produto por id
    Route::delete('/deleteProduto/{id}', 'App\Http\Controllers\ProductController@deleteProduto');

    // Editar produto por id
    Route::post('/updateProduto/{id}', 'App\Http\Controllers\ProductController@updateProduto');

    