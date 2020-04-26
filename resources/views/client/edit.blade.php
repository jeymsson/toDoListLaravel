@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        @component('components.form.update', ['route' => $route, 'id' => $id])
            @component('components.form.text', [
                'label' => 'Nome',
                'id' => 'nome',
                'value' => $row['nome'],])
            @endcomponent
            @component('components.form.text', [
                'label' => 'Idade',
                'id' => 'idade',
                'back_text' => 'Digite a idade',])
            @endcomponent
            @component('components.form.text', [
                'label' => 'Endereço',
                'id' => 'endereco',
                'back_text' => 'Digite o endereço',])
            @endcomponent
            @component('components.form.text', [
                'label' => 'Email',
                'id' => 'email',
                'back_text' => 'Digite um email',])
            @endcomponent
            @component('components.form.back', [ 'route' => $btn_back ])
            @endcomponent
            @component('components.form.submit', [ 'value' => 'Editar' ])
            @endcomponent
        @endcomponent
    @endcomponent
@endsection
