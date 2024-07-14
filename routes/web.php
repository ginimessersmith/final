<?php

use App\Models\DetallePedido;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return redirect(route('login'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'visits');



Route::get('/pizzas', [PizzaController::class, 'index'])
    ->name('pizzas.index')
    ->middleware('auth', 'visits');

Route::post('/pizzas', [PizzaController::class, 'store'])
    ->name('pizzas.store')
    ->middleware('auth');

Route::get('/pizzas/create', [PizzaController::class, 'create'])
    ->name('pizzas.create')
    ->middleware('auth');

Route::put('/pizzas/{id}', [PizzaController::class, 'update'])
    ->name('pizzas.update')
    ->middleware('auth');

Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])
    ->name('pizzas.edit')
    ->middleware('auth');

Route::delete('/pizzas/{id}/destroy', [PizzaController::class, 'destroy'])
    ->name('pizzas.destroy')
    ->middleware('auth');

Route::post('/pizzas/{id}/addToCart', [PizzaController::class, 'addToCart'])
    ->name('pizzas.addToCart')
    ->middleware('auth');

Route::get('/pizzas/{id}/show', [PizzaController::class, 'show'])
    ->name('pizzas.show')->middleware('auth')
    ->middleware('auth');

Route::get('/clientes', [ClienteController::class, 'index'])
    ->name('clientes.index')
    ->middleware('auth', 'visits');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
    ->name('clientes.destroy')
    ->middleware('auth');


Route::get('/search/{query}', [SearchController::class, 'index'])
    ->name('search.index')
    ->middleware('auth');

Route::get('/carrito', [DetallePedidoController::class, 'index'])
    ->name('detalle_pedido.index')
    ->middleware('auth');

Route::delete('/carrito/{id}', [DetallePedidoController::class, 'delete'])
    ->name('detalle_pedido.delete')
    ->middleware('auth');

Route::post('/carrito/checkout', [DetallePedidoController::class, 'checkout'])
    ->name('detalle_pedido.checkout')
    ->middleware('auth');


Route::get('/cajero/view', [PedidoController::class, 'index'])
    ->name('cajero.view')
    ->middleware('auth');

Route::post('/api/callback', [PedidoController::class, 'callback'])
    ->name('callback');


Route::get('/pedidos', [PedidoController::class, 'index'])
    ->name('pedidos.index')
    ->middleware('auth', 'visits');


Route::put('/pedidos/{id}/markAsSent', [PedidoController::class, 'markAsSent'])
    ->name('pedidos.markAsSent')
    ->middleware('auth');

Route::get('/pedidos/historial', [PedidoController::class, 'history'])
    ->name('pedidos.history')
    ->middleware('auth');

Route::get('/search', [SearchController::class, 'find'])->name('search.index');
