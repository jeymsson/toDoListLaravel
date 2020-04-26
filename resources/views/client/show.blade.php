@extends('layouts.index')
@section('title', $title)
@section('content')
    @component('components.form.show', [
        'title'=>$title, 'btn_back' => $btn_back, 'row' => $base])
    @endcomponent
@endsection
