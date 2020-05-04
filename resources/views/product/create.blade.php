{{--  @extends('layouts.index')  --}}

{{--  @section('title', $title)  --}}
{{--  @section('content')  --}}
@component('components.others.modal', ['id_modal'=> 'modal_crud'])
    @component('components.form.card', ['title'=>$title])
        @component('components.form.post', ['route' => $route])
            <input type="hidden" name="id" id="id">
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
            @component('components.form.back', [ 'onclick' => 'backmodal()' ])
            @endcomponent
            <span id="post">
                @component('components.form.a_button', [ 'name' => 'Cadastrar', 'onclick' => 'postProduto()' ])
                @endcomponent
            </span>
            <span id="put">
                @component('components.form.a_button', [ 'name' => 'Atualizar', 'style' => 'btn-warning', 'onclick' => 'update()' ])
                @endcomponent
            </span>
        @endcomponent
    @endcomponent

@endcomponent
{{--  @endsection  --}}
