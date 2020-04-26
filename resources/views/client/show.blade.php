@extends('layouts.index')
@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        <b>Codigo:</b> {{ $row['id'] }}<br>
        <b>Nome:</b> {{ $row['nome'] }}<br>
        <b>Idade:</b> {{ $row['idade'] }}<br>
        <b>Endereço:</b> {{ $row['endereco'] }}<br>
        <b>Email:</b> {{ $row['email'] }}<br>
        @component('components.form.back', ['route' => $btn_back])
        @endcomponent
    @endcomponent
@endsection
