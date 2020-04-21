@extends('layouts.index')
@section('title', $title)
<h2>{{ $title }}</h2>
@section('content')
@component('components.form.a_link', ['route' => 'toDoList.create'])
    Novo registro
@endcomponent

@if (count($base) > 0)
    @component('components.rel.table', ['head' => $tabela])
        @foreach ($base as $item)
            @isset($item['task'])

            <tr>
                @rel_td(['td' => $item['id']])  @endrel_td
                @rel_td(['td' => $item['task']])  @endrel_td
                @rel_td()
                    <a href="{{ route('toDoList.show', $item['id']) }}">Exibir</a>
                @endrel_td
                @rel_td()
                    <a href="{{ route('toDoList.edit', $item['id']) }}">Editar</a>
                @endrel_td
                @rel_td()
                    @component('components.form.delete', ['route' => 'toDoList.destroy', 'id' => $item['id']])
                        Remover
                    @endcomponent
                @endrel_td
            </tr>
            @endisset
        @endforeach
    @endcomponent
@else
    <h4>Nenhum registro encontrado.</h4>
@endif
@endsection
