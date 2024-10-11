<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function store(Request $request)
    {
        $tarefa = Tarefa::create([
            'titulo' => $request->titulo,
            'descricao'=>$request->descricao
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'Cadastrado',
            'data'=> $tarefa
        ]);
    }

    public function findByIdRequest(Request $request)
    {
        $tarefa = Tarefa::find($request->id);

        if($tarefa == null){
            return response()->json([
                'status' => false,
                'message'=> 'Usuário não encontrado',
            ]);
        }

        return response()->json([
            'status' => true,
            'message'=> 'Usuário encontrado',
            'data'=>$tarefa
        ]);
    }

    public function findById($id){
        $tarefa = Tarefa::find($id);

        if($tarefa == null){
            return response()->json([
                'status' => false,
                'message'=> 'Usuário não encontrado',
            ]);
        }

        return response()->json([
            'status' => true,
            'message'=> 'Usuário encontrado',
            'data'=>$tarefa
        ]);
    }
}
