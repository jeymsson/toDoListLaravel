@extends('layouts.index')

@section('title', $title)
@section('content')
    @component('components.form.create',
    ['title'=>$title,'route' => $route,'btn_back' => $btn_back])
        @component('components.form.text', [
            'label' => 'Nome',
            'id' => 'nome',
            'back_text' => 'Digite uma nome',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Idade',
            'id' => 'idade',
            'back_text' => 'Digite a idade',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Endereço',
            'id' => 'endereco',
            'back_text' => 'Digite o endereço',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Email',
            'id' => 'email',
            'back_text' => 'Digite um email',])
        @endcomponent
    @endcomponent

@endsection
