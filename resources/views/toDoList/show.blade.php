@extends('layouts.index')
@section('title', $title)
@section('content')

<div class="card border" style="margin: 10px;">
<div class="card-body">
<h2 class="card-title">{{ $title }}</h2>

    <b>Codigo:</b> {{ $row['id'] }}<br>
    <b>Tarefa:</b> {{ $row['task'] }}<br>
    @component('components.form.back', ['route' => $btn_back])
    @endcomponent
</div>
</div>
@endsection
