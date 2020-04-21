<a class="btn {{ $style ?? 'btn-primary' }}" href="{{ route( $route, ($id ?? null) ) }}">{{ $slot }}</a>
