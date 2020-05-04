{{--  @extends('layouts.index')  --}}
{{--  @section('title', $title)  --}}
{{--  @section('content')  --}}
@component('components.others.modal', ['id_modal'=> $modal])
    @component('components.form.card', ['title'=>$title])
        <span id="show_add">
            <span id="show_rem" />
        </span>
        @component('components.form.back', [ 'route' => $btn_back ?? null, 'onclick' => $onclick_back ?? null ])
        @endcomponent
    @endcomponent
@endcomponent
{{--  @endsection  --}}
