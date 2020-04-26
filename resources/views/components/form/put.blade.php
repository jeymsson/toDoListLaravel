<form action="{{ route($route, $id) }}" method="POST">
    @csrf
    @method('PUT')
    {{ $slot }}
</form>
