    @component('components.form.card', ['title'=>$title, 'class'=>$class_card ?? null])
        @component('components.form.post', ['route' => $route])
            {{ $slot }}
            @component('components.form.back', [ 'route' => $btn_back ?? null, 'onclick' => $onclick_back ?? null ])
            @endcomponent

            @if (!isset($onclick_submit))
                @component('components.form.submit', [ 'value' => 'Cadastrar' ])
                @endcomponent
            @else
                @component('components.form.a_button', [ 'name' => 'Cadastrar', 'onclick' => $onclick_submit ?? null ])
                @endcomponent
            @endif
        @endcomponent
    @endcomponent
