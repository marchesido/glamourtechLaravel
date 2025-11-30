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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;

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

Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::get('/produtos/inserir-massa', [ProdutoController::class, 'inserirMassa']);

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

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/pedido/{id}/sucesso', [PedidoController::class, 'sucesso'])->name('pedido.sucesso');
    Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido.show');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/profile', function () {
        return "Perfil do usuário!";
    });
    Route::resource('admin-produtos', AdminProdutoController::class)->parameters(['admin-produtos' => 'produto']);;

    Route::resource('categorias', CategoriaController::class);

    Route::resource('pedidos', PedidoController::class);

    Route::resource('itens-pedidos', ItensPedidoController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
});
