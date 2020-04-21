<form action="{{ route($route, $id) }}" method="POST">
    @csrf
    @method('DELETE')

    @component('components.form.submit', [ 'value' => $slot ])
    @endcomponent
</form>
