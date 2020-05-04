<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $current = '';
    function __construct()
    {
        $this->current = 'product';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabela = array('Id', 'Produto', 'Quantidade', 'Preco', 'Departamento', 'Exibir', 'Editar', 'Remover');
        $current = $this->current;
        return view('product.index', compact(['tabela', 'current']))
            ->with('title', 'Lista de Produtos')
            ->with('route_create', 'product.create')
            ->with('route_show', 'product.show')
            ->with('route_edit', 'product.edit')
            ->with('route_delete', 'product.destroy')
            . $this->create()
            . $this->show();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = $this->current;
        return view('product.create', compact(['current']))
            ->with('route', 'product.store')
            ->with('title', 'Cadastrar produto')
            ->with('modal', 'modal_create')
            ->with('onclick_back', '$("#modal_create").hide(250);')
            ->with('btn_back', 'product.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:clients',
            'quantidade' => 'required',
            'preco' => 'required',
            'departamento' => 'required',
        ]);
        $prod = new Product();
        $prod->nome = $request->input('nome');
        $prod->quantidade = $request->input('quantidade');
        $prod->preco = $request->input('preco');
        $prod->departamento = $request->input('departamento');
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
        // $row = Product::find($id)->toArray();
        return view('layouts.show')
            ->with('modal', 'modal_show')
            ->with('onclick_back', '$("#modal_show").hide(250);')
            ->with('title', 'Produto ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Product::find($id);
        $current = $this->current;
        return view('product.edit', compact(['row', 'id', 'current']))
            ->with('btn_back', 'product.index')
            ->with('route', 'product.update')
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
        $row = Product::find($id);
        if (isset($row)) {
            $row->nome = $request->input('nome');
            $row->quantidade = $request->input('quantidade');
            $row->preco = $request->input('preco');
            $row->departamento = $request->input('departamento');
            $row->save();
            // return response('OK', 200);
            return json_encode($row);
        }
        return response('Produto inexistente', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rel = Product::find($id);
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
        // $row = $this->buscarId($id);
        $row = Product::all();
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
        $row = Product::find($id);
        return json_encode($row);
    }
}
