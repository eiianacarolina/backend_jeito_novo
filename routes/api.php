<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('tarefa',[TarefaController::class, 'store']);

Route::get('tarefa/find/id', [TarefaController::class, 'findByIdRequest']);

Route::get('tarefa/{id}', [TarefaController::class, 'findById']);





