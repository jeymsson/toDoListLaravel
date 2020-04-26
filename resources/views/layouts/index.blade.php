<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{--  // Menu  --}}
    @component('components.navbar', [
        'current' => ($current ?? null),
        'menu' => array(
            array('name'=>'Lista de tarefas', 'route'=>'toDoList.index'),
            array('name'=>'Clientes', 'route'=>'client.index'),)])
    @endcomponent
    {{--  // Error logs  --}}
    {{--  @if ($errors->any())
        @foreach ($errors->all() as $k => $e)
            @component('components.rel.alert') {{ $e }} @endcomponent
        @endforeach
    @endif  --}}
    {{--  // Contents  --}}
    @yield('content')
</body>
</html>
