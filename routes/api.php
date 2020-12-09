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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->group(function () {
    Route::post('auth/login', 'API\UserController@login');
    Route::post('auth/register', 'API\UserController@register');
    Route::get('auth/buscar', 'API\UserController@show');

    Route::get('/limpar-cache', function () {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        return "Cache está limpo!";
    })->name('limpar-cache.index');
});

    Route::prefix('v1')->group(function () {
        Route::group(['middleware' => 'auth:api'], function () {
        Route::get('auth/listar/buscar', 'API\UserController@index');
        Route::get('auth/listar/buscar-por', 'API\UserController@show');
        
        Route::resource('produtos', 'PNA\ProdutoController')->except(['create', 'index', 'show', 'edit']);
        Route::get('produtos/buscar-por', 'PNA\ProdutoController@show')->name('produtos-buscar-por.show');
        Route::get('produtos/atualizar', 'PNA\ProdutoController@update')->name('produtos.update');       

    });
    Route::group(['middleware' => 'api'], function () {
    Route::get('produtos/buscar', 'PNA\ProdutoController@index')->name('produtos-buscar.index');
    });
});

