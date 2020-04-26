@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.edit',
        ['title'=>$title, 'route' => $route, 'id' => $id, 'btn_back' => $btn_back]
    )
        @component('components.form.text', [
            'label' => 'Nome',
            'id' => 'nome',
            'value' => $row['nome'],])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Idade',
            'id' => 'idade',
            'back_text' => 'Digite a idade',
            'value' => $row['idade'],])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Endereço',
            'id' => 'endereco',
            'back_text' => 'Digite o endereço',
            'value' => $row['endereco'],])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Email',
            'id' => 'email',
            'back_text' => 'Digite um email',
            'value' => $row['email'],])
        @endcomponent
    @endcomponent
@endsection
