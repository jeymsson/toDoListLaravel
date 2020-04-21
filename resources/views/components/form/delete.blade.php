<form action="{{ route($route, $id) }}" method="POST">
    @csrf
    @method('DELETE')
    {{ $slot }}
</form>
