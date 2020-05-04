<table class="table table-bordered table-hover {{ $class ?? null }}" align="center">
    <thead>
    <tr>
    @foreach ($head as $td)
            <th scope="col">{{ $td }}</th>
    @endforeach
    </tr>
    </thead>

    {{ $slot }}
</table>
