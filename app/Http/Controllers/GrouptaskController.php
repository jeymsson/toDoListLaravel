<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task_Group;

class GrouptaskController extends Controller
{
    private $current = '';
    function __construct()
    {
        $this->current = 'group_task';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabela = array('Id', 'Grupo', 'Exibir', 'Editar', 'Remover');
        $current = $this->current;
        return view('groupTask.index', compact(['tabela', 'current']))
            ->with('title', 'Grupos e Tarefas')
            ->with('route', 'api/group_task/')
            ->with('show_title', 'Grupo')
            ->with('show_modal', 'modal_show')
            ->with('show_onclick_back', '$("#modal_show").hide(250);')
            ->with('form_title', 'Grupo')
            ->with('form_modal', 'modal_crud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Task_Group();
        $prod->name = $request->input('name');
        $prod->save();
        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $row = Task_Group::find($id);
        if (isset($row)) {
            $row->name = $request->input('name');
            $row->save();
            // return response('OK', 200);
            return json_encode($row);
        }
        return response('Grupo inexistente', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rel = Task_Group::find($id);
        if (isset($rel)) {
            $rel->delete();
            return response('OK', 200);
        }
        return response('Produto inexistente', 404);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2json()
    {
        $row = Task_Group::all();
        return json_encode($row);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2json($id)
    {
        // $row = $this->buscarId($id);
        $row = Task_Group::find($id);
        return json_encode($row);
    }
}
