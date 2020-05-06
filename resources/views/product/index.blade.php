@extends('layouts.index', ['current' => $current ?? null])
@section('title', $title)
@section('content')
    {{-- Index --}}
    @component('components.form.crud_ajax',
    ['title' => $title, 'tabela' => $tabela,
        'show_title' => $show_title,
        'show_modal' => $show_modal,
        'show_onclick_back' => $show_onclick_back,
        'form_title' => $form_title,
        'form_modal' => $form_modal]
    )
        <input type="hidden" name="id" id="id">
        @component('components.form.text', [
            'label' => 'Nome',
            'id' => 'nome',
            'back_text' => 'Digite uma nome',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Quantidade',
            'id' => 'quantidade',
            'back_text' => 'Digite a quantidade',])
        @endcomponent
        @component('components.form.number', [
            'label' => 'Preço',
            'id' => 'preco',
            'step' => '0.01',
            'back_text' => 'Digite o Preço',])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Departamento',
            'id' => 'departamento',
            'back_text' => 'Digite o Departamento',])
        @endcomponent
        <span id="post">
            @component('components.form.a_button', [ 'name' => 'Cadastrar', 'onclick' => 'formPost()' ])
            @endcomponent
        </span>
        <span id="put">
            @component('components.form.a_button', [ 'name' => 'Atualizar', 'style' => 'btn-warning', 'onclick' => 'formUpdate()' ])
            @endcomponent
        </span>
        @component('components.form.back', [ 'onclick' => 'backFormModal()' ])
        @endcomponent
    @endcomponent
@endsection

@section('javascript')

    {{-- Funcoes padrao --}}
    @component('components.form.crud_js_ajax',
    ['title' => $title, 'tabela' => $tabela,
        'route' => $route, 'form_modal' => $form_modal])
    @endcomponent

    <script type="text/javascript">
        // Exibe detalhado
        function show_exibition(d){
            $('span#show_add').prepend(
                '<span id=show_rem><table>'+
                    '<tr><td>Id:</td><td>'+d['id']+'</td></tr>'+
                    '<tr><td>Nome:</td><td>'+d['nome']+'</td></tr>'+
                    '<tr><td>Quantidade:</td><td>'+d['quantidade']+'</td></tr>'+
                    '<tr><td>Preco:</td><td>'+d['preco']+'</td></tr>'+
                    '<tr><td>Departamento:</td><td>'+d['departamento']+'</td></tr>'+
                '</span>'
            )
        }
        // Limpar campos
        function clean_fields(){
            return {
                'id': '',
                'nome': '',
                'quantidade': '',
                'preco': '',
                'departamento': '',
            };
        }
        // Exibe Edição
        function set_form_values(d){
            $('#id').val(d['id']);
            $('#nome').val(d['nome']);
            $('#quantidade').val(d['quantidade']);
            $('#preco').val(d['preco']);
            $('#departamento').val(d['departamento']);
        }
        // Obtem valores para submição
        function get_form_value(){
            return {
                'nome': $('#nome').val(),
                'quantidade': $('#quantidade').val(),
                'preco': $('#preco').val(),
                'departamento': $('#departamento').val(),
            };
        }
        // Monta linha da tabela
        function editLine(id, dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            var col = $('#l_'+id+'>td');
            col[0].innerText = dado['id'];
            col[1].innerText = dado['nome'];
            col[2].innerText = dado['quantidade'];
            col[3].innerText = dado['preco'];
            col[4].innerText = dado['departamento'];
        }
        // Monta linha da tabela
        function addLine(dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            line =
                '<tr id="l_'+dado['id']+'">'
                    + '<td>'+dado['id']+'</td>'
                    + '<td>'+dado['nome']+'</td>'
                    + '<td>'+dado['quantidade']+'</td>'
                    + '<td>'+dado['preco']+'</td>'
                    + '<td>'+dado['departamento']+'</td>'
                + '<td><button class="btn btn-info" onclick="formShow('+dado['id']+')">Exibir</button></td>'
                + '<td><button class="btn btn-warning" onclick="showModalPut('+dado['id']+')">Editar</button></td>'
                + '<td><button class="btn btn-danger" onclick="formDestroy('+dado['id']+')">Remover</button></td>'
                + '</tr>';
            $('table').append(line);
        }
    </script>
@endsection
