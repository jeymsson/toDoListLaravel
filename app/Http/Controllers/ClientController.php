<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $route = '';
    function __construct()
    {
        $this->route = 'client';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base = Client::all();
        $tabela = array('Id', 'Tarefa', 'Exibir', 'Editar', 'Remover');
        return view('client.index', compact(['base', 'tabela']))
            ->with('title', 'Lista de Clientes')
            ->with('route_create', 'client.create')
            ->with('route_show', 'client.show')
            ->with('route_edit', 'client.edit')
            ->with('route_delete', 'client.destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset($errors)) {
            echo var_dump($errors);
        }
        return view('client.create')
            ->with('route', 'client.store')
            ->with('title', 'Cadastrar cliente')
            ->with('btn_back', 'client.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|min:3|max:40|unique:clients']);
        $task = new Client();
        $task->nome = $request->input('nome');
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
        $row = Client::find($id);
        return view('client.show', compact(['row']))
            ->with('btn_back', 'client.index')
            ->with('title', 'Cliente ' . $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Client::find($id);
        return view('client.edit', compact(['row', 'id']))
            ->with('btn_back', 'client.index')
            ->with('route', 'client.update')
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
        $row = Client::find($id);
        if (isset($row)) {
            $row->nome = $request->input('nome');
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
        Client::find($id)->delete();
        return $this->index();
    }
}
