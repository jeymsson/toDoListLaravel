<div class="card border" style="margin: 10px;">

    <div class="card-body">
        @if (isset($title) && !empty($title))
            <h2 class="card-title">{{ $title }}</h2>
        @endif
        {{ $slot }}
    </div>
</div>
