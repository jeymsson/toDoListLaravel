@extends('layouts.index')
@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        <b>Codigo:</b> {{ $row['id'] }}<br>
        <b>Tarefa:</b> {{ $row['task'] }}<br>
        @component('components.form.back', ['route' => $btn_back])
        @endcomponent
    @endcomponent

@endsection
