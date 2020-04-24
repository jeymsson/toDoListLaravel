@extends('layouts.index')
@section('title', $title)
@section('content')
<div class="card border" style="margin: 10px;">
    <div class="card-body">
    <h2 class="card-title">{{ $title }}</h2>
    @component('components.form.a_button', ['route' => 'toDoList.create'])
        Novo registro
    @endcomponent

    @if (count($base) > 0)
        @component('components.rel.table', ['head' => $tabela, 'class'=> 'table-dark'])
            @foreach ($base as $item)
                @isset($item['task'])

                <tr>
                    @rel_td(['td' => $item['id']])  @endrel_td
                    @rel_td(['td' => $item['task']])  @endrel_td
                    @rel_td()
                        @component('components.form.a_button', ['route' => 'toDoList.show', 'id' => $item['id'], 'style' => 'btn-info'])
                            Exibir
                        @endcomponent
                    @endrel_td
                    @rel_td()
                        @component('components.form.a_button', ['route' => 'toDoList.edit', 'id' => $item['id'], 'style' => 'btn-warning'])
                            Editar
                        @endcomponent
                    @endrel_td
                    @rel_td()
                        @component('components.form.delete', ['route' => 'toDoList.destroy', 'id' => $item['id'], 'style' => 'btn-danger'])
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
    </div>
</div>
@endsection
