<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Task_Group;

class toDoListController extends Controller
{
    private $current = '';
    function __construct()
    {
        $this->current = 'toDoList';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base = Task::all();
        $tabela = array('Id', 'Tarefa', 'Grupo', 'Exibir', 'Editar', 'Remover');
        $current = $this->current;
        return view('toDoList.index', compact(['base', 'tabela', 'current']))
            ->with('title', 'Lista de Tarefas')
            ->with('route_create', 'toDoList.create')
            ->with('route_show', 'toDoList.show')
            ->with('route_edit', 'toDoList.edit')
            ->with('route_delete', 'toDoList.destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = $this->current;
        return view('toDoList.create', compact(['current']))
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
        $current = $this->current;
        return view('toDoList.show', compact(['row', 'current']))
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
        $group = Task_Group::all()
            ->map
            ->only(['id', 'name'])
            ->toArray();

        $array_grupo = array();
        foreach ($group as $v) {
            $array_grupo[] = ['cod' => $v['id'], 'des' => $v['name']];
        }

        $current = $this->current;
        return view('toDoList.edit', compact(['row', 'id', 'current']))
            ->with('btn_back', 'toDoList.index')
            ->with('route', 'toDoList.update')
            ->with('title', 'Editar: ' . $id)
            ->with('array_grupo', $array_grupo);
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
            $row->group_id = $request->input('grupo');
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
