@extends('layouts.index')

@section('title', $title)
<h2>{{ $title }}</h2>
@section('content')

    {{-- {{ dd($route) }} --}}
    @component('components.form.update', ['route' => $route, 'id' => '1'])
        @component('components.form.text', [
            'label' => 'Tarefa',
            'id' => 'task',
            'value' => $row['task'],
        ])
        @endcomponent
        @component('components.form.submit', [ 'value' => 'Editar' ])
        @endcomponent
        <br>
        @component('components.form.back', [ 'route' => $btn_back ])
        @endcomponent
    @endcomponent
@endsection
