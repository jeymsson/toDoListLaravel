@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.card', ['route' => 'toDoList.create', 'title'=>$title])
        @component('components.form.post', ['route' => 'toDoList.index'])
            @component('components.form.text', [
                'label' => 'Tarefa',
                'id' => 'task',
                'back_text' => 'Digite uma tarefa',
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
