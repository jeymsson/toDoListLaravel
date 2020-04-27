@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.edit',
    ['title'=>$title, 'route' => $route, 'id' => $id, 'btn_back' => $btn_back])
        @component('components.form.text', [
            'label' => 'Nome',
            'id' => 'nome',
            'value' => $row['nome'],
            'back_text' => 'Digite uma nome',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Quantidade',
            'id' => 'quantidade',
            'value' => $row['quantidade'],
            'back_text' => 'Digite a quantidade',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Preço',
            'id' => 'preco',
            'value' => $row['preco'],
            'step' => '0.01',
            'back_text' => 'Digite o Preço',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Departamento',
            'id' => 'departamento',
            'value' => $row['departamento'],
            'back_text' => 'Digite o Departamento',])
        @endcomponent
    @endcomponent
@endsection
