    @component('components.form.card', ['title'=>$title])
        @foreach ($row as $k => $r)
            <b>{{ $k }}:</b> {{ $r }}<br>
        @endforeach
        @component('components.form.back', ['route' => $btn_back])
        @endcomponent
    @endcomponent
