@extends('layouts.index')

@section('title', $title)
@section('content')

<div class="card border" style="margin: 10px;">
<div class="card-body">
<h2 class="card-title">{{ $title }}</h2>

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
</div>
</div>
@endsection
