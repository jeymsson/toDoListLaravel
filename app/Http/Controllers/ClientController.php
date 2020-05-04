<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $current = '';
    function __construct()
    {
        $this->current = 'client';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $base = Client::all();
        $tabela = array('Id', 'Cliente', 'Idade', 'Endereço', 'Email', 'Exibir', 'Editar', 'Remover');
        $current = $this->current;
        return view('client.index', compact(['base', 'tabela', 'current']))
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
        $current = $this->current;
        return view('client.create', compact(['current']))
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
        /*$request->validate([
            'nome' => 'required|min:3|max:40|unique:clients',
            'idade' => 'required',
            'endereco' => 'required',
            'email' => 'required|email',
        ]);*/
        $regras = [
            'nome' => 'required|min:3|max:40|unique:clients',
            'idade' => 'required',
            'endereco' => 'required',
            'email' => 'required|email',
        ];
        $msgm = [
            'nome.required' => 'O campo Nome é obrigatório.',
            'idade.required' => 'O campo idade é obrigatório.',
            'endereco.required' => 'O campo Endereco é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
        ];
        $request->validate($regras, $msgm);
        $task = new Client();
        $task->nome = $request->input('nome');
        $task->idade = $request->input('idade');
        $task->endereco = $request->input('endereco');
        $task->email = $request->input('email');
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
        $row = Client::find($id)->toArray();
        $base = array(
            'Codigo' => $row['id'],
            'Nome' => $row['nome'],
            'Idade' => $row['idade'],
            'Endereço' => $row['endereco'],
            'Email' => $row['email']
        );
        $current = $this->current;
        return view('layouts.show', compact(['base', 'current']))
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
        $current = $this->current;
        return view('client.edit', compact(['row', 'id', 'current']))
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
        $regras = [
            'nome' => 'required|min:3|max:40',
            'idade' => 'required',
            'endereco' => 'required',
            'email' => 'required|email',
        ];
        $msgm = [
            'nome.required' => 'O campo Nome é obrigatório.',
            'idade.required' => 'O campo idade é obrigatório.',
            'endereco.required' => 'O campo Endereco é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
        ];
        $request->validate($regras, $msgm);
        $row = Client::find($id);
        if (isset($row)) {
            $row->nome = $request->input('nome');
            $row->idade = $request->input('idade');
            $row->endereco = $request->input('endereco');
            $row->email = $request->input('email');
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

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2json()
    {
        // $row = $this->buscarId($id);
        $row = Client::all();
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
        $row = Client::find($id);
        return json_encode($row);
    }
}
