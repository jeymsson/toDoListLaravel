@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        @component('components.form.update', ['route' => $route, 'id' => $id])
            @component('components.form.text', [
                'label' => 'Nome',
                'id' => 'nome',
                'value' => $row['nome'],
            ])
            @endcomponent
            @component('components.form.submit', [ 'value' => 'Editar' ])
            @endcomponent
            <br>
            @component('components.form.back', [ 'route' => $btn_back ])
            @endcomponent
        @endcomponent
    @endcomponent

@endsection