@extends('layouts.index')
@section('title', $title)
<h2>{{ $title }}</h2>
@section('content')
@component('components.form.a_link', ['route' => 'toDoList.create'])
    Novo registro
@endcomponent

@if (count($base) > 0)
    @foreach ($base as $item)
        @isset($item['task'])
            <br>
            {{ $item['id'] }} - {{ $item['task'] }}
            | <a href="{{ route('toDoList.show', $item['id']) }}">Exibir</a>
            | <a href="{{ route('toDoList.edit', $item['id']) }}">Editar</a>
            |
            @component('components.form.delete', ['route' => 'toDoList.destroy', 'id' => $item['id']])
                Remover
            @endcomponent
        @endisset
    @endforeach
@else
    <h4>Nenhum registro encontrado.</h4>
@endif

@endsection
