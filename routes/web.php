<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//      ** GRUPO DE ROTAS
/*
Route::middleware([])->group(function () {

    // PREFIXO /WP-ADMIN/...
    Route::prefix('wp-admin')->group(function () {



        Route::get('/dashboard', function() {
            return 'Essa é a home do Admin, o brabor.';
        });
        Route::get('/financa', function() {
            return 'Essa é a home do Financeiro, o bilonaro.';
        });
        Route::get('/produto', function() {
            return 'Essa é a home do Repositor (eu acho q é esse o nome sla).';
        });
        Route::get('/', function() {
            return redirect('/wp-admin/dashboard');
        });



        Route::namespace('Testes')->group(function () {

            Route::name('testes.')->group(function () {

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                Route::get('/financa', 'TesteController@teste')->name('financa');
                Route::get('/produto', 'TesteController@teste')->name('produto');
                Route::get('/', function() {
                    return redirect()->route('testes.dashboard');
                })->name('home');
            });
        });
    });
});
*/



//      ** FORMA MAIS ENXUTA DE ESCREVER AS ROTAS

Route::group([
    'middleware' => [],
    'prefix' => 'wp-admin',
    'namespace' => 'Testes',
    'name' => 'testes.'
], function() {
    Route::get('/dashboard', 'TesteController@testeDashboard')->name('dashboard');
    Route::get('/financa', 'TesteController@testeFinanca')->name('financa');
    Route::get('/produto', 'TesteController@testeProduto')->name('produto');
    Route::get('/', function() {
        return redirect()->route('testes.dashboard');
    })->name('home');
});



//      ** ROTAS NOMEADAS (REFATORAR CÓDIGOS, ETC)

Route::get('/redirecionar-boas-vindas', function() {
    return redirect()->route('url-boas-vindas');
});

Route::get('/name-url', function() {
    return 'bem_vindo.mov';
})->name('url-boas-vindas');



//      ** API RESTFUL

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Professor/{id_professor?}', function ($id_professor = "") {
    return "Professor  {$id_professor}";
});