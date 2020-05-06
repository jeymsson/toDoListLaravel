{{-- index --}}
@component('components.form.card', ['title'=>$title])
    @component('components.form.a_button', ['onclick' => 'showModalPost()'])
        Novo registro
    @endcomponent

    @component('components.rel.table', ['head' => $tabela, 'class'=> 'table-dark'])
    @endcomponent
@endcomponent

{{-- show --}}
@component('components.others.modal', ['id_modal'=> $show_modal])
    @component('components.form.card', ['title'=>$show_title])
        <span id="show_add">
            <span id="show_rem" />
        </span>
        @component('components.form.back', [ 'onclick' => $show_onclick_back ])
        @endcomponent
    @endcomponent
@endcomponent

{{-- form --}}
@component('components.others.modal', ['id_modal'=> $form_modal])
    @component('components.form.card', ['title'=>$form_title])
        {{ $slot }}
    @endcomponent

@endcomponent
