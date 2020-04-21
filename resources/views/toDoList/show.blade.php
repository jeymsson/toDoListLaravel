@extends('layouts.index')
@section('title', $title)
<h2>{{ $title }}</h2>
@section('content')
    Codigo: {{ $row['id'] }}<br>
    Tarefa: {{ $row['task'] }}<br>
    @component('components.form.back', ['route' => $btn_back])
    @endcomponent
@endsection
