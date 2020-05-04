@if (isset($menu) && count($menu) >0)
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                @foreach ($menu as $m)
                    @php
                        $c = explode('.', $m['route'])[0];
                    @endphp
                    <li class="nav-item {{$c==$current ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route($m['route']) }}">{{ $m['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
@endif

