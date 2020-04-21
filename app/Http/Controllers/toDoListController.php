<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class toDoListController extends Controller
{
    private $toDoList = [];
    private $maxId = '';
    private $route = '';
    private $table = '';

    function __construct()
    {
        $this->route = 'toDoList';
        $this->table = 'toDoList';
        $base = session($this->table);
        if (!isset($base)) {
            session([$this->table => $this->toDoList]);
        }
    }

    function buscarId($id, $pos = false)
    {
        $base = session($this->table);
        $t = !$pos && isset($base[$id - 1]['id']) ? true : false;
        if ($t && $id == ($base[$id - 1]['id'])) {
            $base = $base[$id - 1];
        } else {
            foreach ($base as $k => $b) {
                if ($b['id'] == $id) {
                    if ($pos) {
                        $base = $k;
                    } else {
                        $base = $b;
                    }
                    break;
                }
                $base = null;
            }
        }
        return $base;
    }
    function maxId()
    {
        $base = session($this->table);
        $max = 0;
        if (count($base) > 0) {
            foreach ($base as $b) {
                if ($b['id'] > $max) {
                    $max = $b['id'];
                }
            }
        }
        return $max;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base = session($this->table);
        return view('toDoList.index', compact(['base']))
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
        $base = session($this->table);
        $r = $request->all();
        $id = $this->maxId() + 1;
        $task = $r['task'];
        $base[] = ['id' => $id, 'task' => $task];
        session([$this->table => $base]);
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
        $row = $this->buscarId($id);
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
        $row = $this->buscarId($id);
        return view('toDoList.edit', compact(['row']))
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
        $base = session($this->table);
        $r = $request->all();
        $pos = $this->buscarId($id, true);
        $base[$pos]['task'] = $r['task'];
        session([$this->table => $base]);
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
        $pos = $this->buscarId($id, true);
        $base = session($this->table);
        unset($base[$pos]);
        session([$this->table => $base]);
        return $this->index();
    }
}
