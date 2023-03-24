<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Http\Requests\TarefaUpdateRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TarefaController extends Controller
{
    public function __construct(protected readonly Tarefa $tarefa)
    {
    }

    /**
     * Lista tarefas
     * 
     * Lista todas as tarefas
     * 
     * @group Tarefas 
     */
    public function index()
    {      
        return $this->tarefa->select(['tarefa', 'descricao', 'status'])->get();
    }

    /**
     * Cadastra uma tarefa
     * 
     * Cadastra uma nova tarefa
     * 
     * @group Tarefas 
     */
    public function store(TarefaRequest $request, Tarefa $tarefa)
    {   
        $tarefa->create([
            'tarefa' =>  $request->input('tarefa'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status')
        ]);

        return response()->noContent(Response::HTTP_CREATED);
    }

    /**
     * Detalhar tarefa
     * 
     * Detalha os dados de uma tarefa
     * 
     * @group Tarefas 
    */
    public function show(Tarefa $tarefa)
    {
        return $tarefa;
    }

     /**
     * Atualizar tarefa
     * 
     * Atualiza os dados de uma tarefa
     * 
     * @group Tarefas 
    */
    public function update(TarefaUpdateRequest $request, Tarefa $tarefa)
    {
        $tarefa->update([
            'tarefa' => $request->input('tarefa'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status')
        ]);

        return $tarefa;
    }

    /**
     * Deletar tarefa
     * 
     * Deleta uma tarefa
     * 
     * @group Tarefas 
    */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->noContent(Response::HTTP_NO_CONTENT);
    }
}
