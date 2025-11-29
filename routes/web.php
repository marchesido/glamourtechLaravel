<?php

use App\Http\Controllers\AdminProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItensPedidoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;
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

//Route::get('/', function () {
//return view('welcome');
//});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('/dashboard', function () {
        return "Você está logado!";
    });

    Route::get('/profile', function () {
        return "Perfil do usuário!";
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('/sobre', function () {
        return view('sobre');
    })->name('sobre');

    Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

    Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

    Route::resource('produtos', ProdutoController::class)->only(['show', 'index']);
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/profile', function () {
        return "Perfil do usuário!";
    });
    Route::resource('admin-produtos', AdminProdutoController::class)->parameters(['admin-produtos' => 'produto']);;

    Route::resource('categorias', CategoriaController::class);

    Route::resource('pedidos', PedidoController::class);

    Route::resource('itens-pedidos', ItensPedidoController::class);
});
