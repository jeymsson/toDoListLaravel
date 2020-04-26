    @component('components.form.card',
    ['title'=>$title])
        @component('components.form.put',
        ['route' => $route, 'id' => $id])
            {{ $slot }}
            @component('components.form.back', [ 'route' => $btn_back ])
            @endcomponent
            @component('components.form.submit', [ 'value' => 'Editar' ])
            @endcomponent
        @endcomponent
    @endcomponent
