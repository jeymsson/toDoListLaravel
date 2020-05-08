<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    {{--  // Menu  --}}
    @component('components.navbar', [
        'current' => ($current ?? null),
        'menu' => array(
            array('name'=>'Lista de tarefas', 'route'=>'toDoList.index'),
            array('name'=>'Grupos de tarefa', 'route'=>'group_task.index'),
            array('name'=>'Clientes', 'route'=>'client.index'),
            array('name'=>'Produtos', 'route'=>'product.index'),
            array('name'=>'Países', 'route'=>'country.index'),
        )])
    @endcomponent
    @yield('content')
    @hasSection ('javascript')
        @yield('javascript')
    @endif

</body>
</html>
