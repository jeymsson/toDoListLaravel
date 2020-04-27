<a class="btn {{ $style ?? 'btn-primary' }}"
    onclick="{{ $onclick ?? null }}"
    href="
        @if (!isset($route)) # @else
            {{ route( $route, ($id ?? null) ) }}
        @endif
    ">{{ $slot }}</a>
