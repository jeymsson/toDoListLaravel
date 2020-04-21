<form action="{{ route($route, $id) }}" method="POST" style="margin: auto;">
    @csrf
    @method('DELETE')

    @component('components.form.submit', [ 'value' => $slot, 'style' => $style ?? null ])
    @endcomponent
</form>
