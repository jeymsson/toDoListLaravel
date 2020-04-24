@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        @component('components.form.post', ['route' => $route])
            @component('components.form.text', [
                'label' => 'Nome',
                'id' => 'nome',
                'back_text' => 'Digite uma nome',
            ])
            @endcomponent
            @component('components.form.submit', [ 'value' => 'Cadastrar' ])
            @endcomponent
            <br>
            @component('components.form.back', [ 'route' => $btn_back ])
            @endcomponent
        @endcomponent
    @endcomponent

@endsection
