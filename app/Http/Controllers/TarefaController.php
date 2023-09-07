<?php

namespace App\Http\Controllers;

use App\Mail\tarefaMail;
use App\Models\tarefa;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//{{route('LojaController.minhaLoja',['nome'=>$sessao->nomeLoja])}}

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $estatistica = $this->estatistica();
        $tarefas = tarefa::where('user_id', $user->id)->get();
        return view('tarefa', compact('user', 'tarefas', 'estatistica'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tituloTarefa' => 'required|string|max:255',
            'descricaoTarefa' => 'nullable|string',
            'dataInicio' => 'required|date',
            'dataConclusao' => 'required|date',
            'prioridade' => 'required|in:Baixa,Média,Alta',
            'categoria' => 'required|in:Trabalho,Estudo,Pessoal,Saúde,Outros',
            'notas' => 'nullable|string',
        ]);
        $user = Auth::user(); 
        $request['user_id'] = $user->id;
        
        if(tarefa::create($request->all())){
            Mail::to($user->email)->send(new tarefaMail(
                $request['tituloTarefa'], 
                $request['descricaoTarefa'],
                $user->name,
                $request['prioridade'],
                $request['categoria'],
                $request['dataInicio'],
                $request['dataConclusao'],
                $request['notas'],
            ));

            return redirect()->route('tarefas');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tarefa $tarefa)
    {
        //
    }

    public function estatistica(){
        $user = Auth::user();
        $tarefas = Tarefa::where('user_id', $user->id)->get();
        $estatistica = array();
        $concluidasE = 0;
        $andamentoE = 0;
        $atrasoE = 0;
        $concluidas = 0;
        $andamento = 0;
        $atraso = 0;
        $nr = count($tarefas); // Corrigido para usar a função count()
    
        foreach ($tarefas as $tarefa) { // Iterar sobre cada tarefa
            if ($tarefa->terminada == true) {
                $concluidas = $concluidas + 1;
                    $concluidasE = ($concluidas * 100) / $nr;
            } elseif ($tarefa->terminada == false && $tarefa->dataConclusao < date('Y-m-d')) {
                $atraso = $atraso + 1;
                $atrasoE = ($atraso * 100) / $nr;
            } else {
                $andamento = $andamento + 1;
                $andamentoE= ($andamento * 100) / $nr;
            }
        }

        $estatistica[0] = number_format($andamentoE,1, '.', '');
        $estatistica[1] = number_format($concluidasE,1, '.', '');
        $estatistica[2] = number_format($atrasoE,1, '.', '');
    
        return $estatistica; // Removido os parênteses ()
    }
}
