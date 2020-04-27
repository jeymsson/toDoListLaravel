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
        $base = Product::all();
        $tabela = array('Id', 'Produto', 'Quantidade', 'Preco', 'Departamento', 'Exibir', 'Editar', 'Remover');
        $current = $this->current;
        return view('product.index', compact(['base', 'tabela', 'current']))
            ->with('title', 'Lista de Produtos')
            ->with('route_create', 'product.create')
            ->with('route_show', 'product.show')
            ->with('route_edit', 'product.edit')
            ->with('route_delete', 'product.destroy');
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
        $row = Product::find($id)->toArray();
        $base = array(
            'Codigo' => $row['id'],
            'Nome' => $row['nome'],
            'Quantidade' => $row['quantidade'],
            'Preco' => $row['preco'],
            'Departamento' => $row['departamento']
        );
        $current = $this->current;
        return view('layouts.show', compact(['base', 'current']))
            ->with('btn_back', 'product.index')
            ->with('title', 'Produto ' . $id);
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
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:clients',
            'quantidade' => 'required',
            'preco' => 'required',
            'departamento' => 'required',
        ]);
        $row = Product::find($id);
        if (isset($row)) {
            $row->nome = $request->input('nome');
            $row->quantidade = $request->input('quantidade');
            $row->preco = $request->input('preco');
            $row->departamento = $request->input('departamento');
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
        Product::find($id)->delete();
        return $this->index();
    }
}
