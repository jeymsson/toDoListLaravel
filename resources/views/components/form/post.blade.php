
<form action="{{ route($route) }}" method="post">
    @csrf
    {{ $slot }}
</form>
