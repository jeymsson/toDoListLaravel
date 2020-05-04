<a class="btn {{ $style ?? 'btn-info' }}"
    href="@if (isset($route)) {{ route( $route, ($id ?? null) ) }} @else # @endif"
    onclick="{{ $onclick ?? null }}"
    >
    Voltar</a>
