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
     public function getAll(){
        $tarefa = Tarefa::all();

        return response()->json([
            'status' => true,
            'data'=>$tarefa
        ]);
    }

    public function findByName(Request $request){
        $tarefa = Tarefa::where('titulo', 'like', '%' . $request->titulo . '%')->get();

        if($tarefa->isEmpty()){
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

    public function delete(Request $request){
        $tarefa = Tarefa::find($request->id);

        if($tarefa == null){
            return response()->json([
                'status' => false,
                'message'=> 'Usuário não encontrado',
            ]);
        }

        $tarefa->delete();

        return response()->json([
            'status' => true,
            'message'=> 'Usuário excluído com sucesso!!'
        ]);
    }

    public function update(Request $request){
        $tarefa = Tarefa::find($request->id);

       if($tarefa == null){
         return response()->json()([
            'status'=> false,
            'message'=> "Usuário não encontrado"
         ]);
       }

       if(isset($request->titulo)){
        $tarefa->titulo = $request->titulo;
       }

       if(isset($request->descricao)){
        $tarefa->descricao=$request->descricao;
       }

       if(isset($request->status)){
        $tarefa->status=$request->status;
       }

       $tarefa->update();

       return response()->json([
        'status'=>true,
        'message'=> "Usuário atualizado com sucesso!"
       ]);
    }

    public function where(Request $request){
        $tarefa = Tarefa::whereDay( 'created_at', '=', $request->dia)->whereMonth( 'created_at', '=', $request->mes )->get();

        if($tarefa->isEmpty()){
            return response()->json([
                'status'=> false,
                'message'=> 'Usuário não encontrado'
            ]);
        }

        return response()->json([
            'status'=> true,
            'message'=> 'Usuário encontrado',
            'data'=> $tarefa
        ]);

       
    }
}
