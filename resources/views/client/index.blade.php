@extends('layouts.index', ['current' => $current ?? null])
@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        @component('components.form.a_button', ['route' => $route_create])
            Novo registro
        @endcomponent

        @if (count($base) > 0)
            @component('components.rel.table', ['head' => $tabela, 'class'=> 'table-dark'])
                @foreach ($base as $item)
                    @isset($item['nome'])

                    <tr>
                        @rel_td(['td' => $item['id']])  @endrel_td
                        @rel_td(['td' => $item['nome']])  @endrel_td
                        @rel_td(['td' => $item['idade']])  @endrel_td
                        @rel_td(['td' => $item['endereco']])  @endrel_td
                        @rel_td(['td' => $item['email']])  @endrel_td
                        @rel_td()
                            @component('components.form.a_button', ['route' => $route_show, 'id' => $item['id'], 'style' => 'btn-info'])
                                Exibir
                            @endcomponent
                        @endrel_td
                        @rel_td()
                            @component('components.form.a_button', ['route' => $route_edit, 'id' => $item['id'], 'style' => 'btn-warning'])
                                Editar
                            @endcomponent
                        @endrel_td
                        @rel_td()
                            @component('components.form.delete', ['route' => $route_delete, 'id' => $item['id'], 'style' => 'btn-danger'])
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
    @endcomponent

@endsection
