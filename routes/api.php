<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('tarefa',[TarefaController::class, 'store']);

Route::get('tarefa/find/id', [TarefaController::class, 'findByIdRequest']);

Route::get('tarefa/{id}', [TarefaController::class, 'findById']);

Route::get('tarefa', [TarefaController::class, 'getAll']);

Route::get('tarefa/find/titulo', [TarefaController::class, 'findByName']);

Route::delete('tarefa', [TarefaController::class, 'delete']);

Route::put('tarefa',[TarefaController::class, 'update']);

Route::get('tarefa/find/dia_mes', [TarefaController::class, 'where']);
