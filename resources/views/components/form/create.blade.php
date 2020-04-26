    @component('components.form.card', ['title'=>$title])
        @component('components.form.post', ['route' => $route])
            {{ $slot }}
            @component('components.form.back', [ 'route' => $btn_back ])
            @endcomponent
            @component('components.form.submit', [ 'value' => 'Cadastrar' ])
            @endcomponent
        @endcomponent
    @endcomponent
