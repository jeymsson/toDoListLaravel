<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class toDoListController extends Controller
{
    private $route = '';
    function __construct()
    {
        $this->route = 'toDoList';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base = Task::all();
        $tabela = array('Id', 'Tarefa', 'Exibir', 'Editar', 'Remover');
        return view('toDoList.index', compact(['base', 'tabela']))
            ->with('title', 'Lista de Tarefas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toDoList.create')
            ->with('route', 'toDoList.store')
            ->with('title', 'Cadastrar tarefa')
            ->with('btn_back', 'toDoList.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->task = $request->input('task');
        $task->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $row = $this->buscarId($id);
        $row = Task::find($id);
        return view('toDoList.show', compact(['row']))
            ->with('btn_back', 'toDoList.index')
            ->with('title', 'Tarefa ' . $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Task::find($id);
        return view('toDoList.edit', compact(['row', 'id']))
            ->with('btn_back', 'toDoList.index')
            ->with('route', 'toDoList.update')
            ->with('title', 'Editar: ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Task::find($id);
        if (isset($row)) {
            $row->task = $request->input('task');
            $row->save();
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return $this->index();
    }
}
