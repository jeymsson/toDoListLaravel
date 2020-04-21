<form action="{{ route($route, $id) }}" method="post">
    @csrf
    @method('PUT')
    {{ $slot }}
</form>
