<table class="table table-hover">
    <thead>
    <tr>
    @foreach ($head as $td)
            <th scope="col">{{ $td }}</th>
    @endforeach
    </tr>
    </thead>

    {{ $slot }}
</table>
