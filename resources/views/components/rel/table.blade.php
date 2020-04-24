<table class="table table-hover {{ $class ?? null }}">
    <thead>
    <tr>
    @foreach ($head as $td)
            <th scope="col">{{ $td }}</th>
    @endforeach
    </tr>
    </thead>

    {{ $slot }}
</table>
