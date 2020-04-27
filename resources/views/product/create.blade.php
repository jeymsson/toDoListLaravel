{{--  @extends('layouts.index')  --}}

{{--  @section('title', $title)  --}}
{{--  @section('content')  --}}
@component('components.others.modal', ['id_modal'=> 'modal_create'])
    @component('components.form.create',
    ['title'=>$title,'route' => $route,'btn_back' => $btn_back])
        @component('components.form.text', [
            'label' => 'Nome',
            'id' => 'nome',
            'back_text' => 'Digite uma nome',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Quantidade',
            'id' => 'quantidade',
            'back_text' => 'Digite a quantidade',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Preço',
            'id' => 'preco',
            'step' => '0.01',
            'back_text' => 'Digite o Preço',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Departamento',
            'id' => 'departamento',
            'back_text' => 'Digite o Departamento',])
        @endcomponent
    @endcomponent
@endcomponent
{{--  @endsection  --}}
