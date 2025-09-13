<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;

// rota de teste
Route::get('/', function () {
    return response()->json(['API de Estoque' => true]);
});

Route::get('/estoques/busca', [EstoqueController::class, 'buscar']);
// rotas para visualizar os registros
Route::get('/estoques', [EstoqueController::class, 'index']);
Route::get('/estoques/{estoque}', [EstoqueController::class, 'show']);

// rota para inserir os registros
Route::post('/estoques', [EstoqueController::class, 'store']);

// rota para alterar os registros
Route::put('/estoques/{estoque}', [EstoqueController::class, 'update']);

// rota para excluir o registro por id
Route::delete('/estoques/{estoque}', [EstoqueController::class, 'destroy']);
