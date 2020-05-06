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
            'back_text' => 'Digite o nome'])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Idade',
            'id' => 'idade',
            'back_text' => 'Digite a idade'])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Endereco',
            'id' => 'endereco',
            'back_text' => 'Digite o endereço'])
        @endcomponent
        @component('components.form.text', [
            'label' => 'Email',
            'id' => 'email',
            'back_text' => 'Digite um email'])
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
    ['title' => $title, 'tabela' => $tabela, 'route' => $route, 'form_modal' => $form_modal])

        // Exibe detalhado
        function show_exibition(d){
            $('span#show_add').prepend(
                '<span id=show_rem><table>'+
                    '<tr><td>Id:</td><td>'+d['id']+'</td></tr>'+
                    '<tr><td>Cliente:</td><td>'+d['nome']+'</td></tr>'+
                    '<tr><td>Idade:</td><td>'+d['idade']+'</td></tr>'+
                    '<tr><td>Endereço:</td><td>'+d['endereco']+'</td></tr>'+
                    '<tr><td>Email:</td><td>'+d['email']+'</td></tr>'+
                '</span>'
            )
        }
        // Limpar campos
        function clean_fields(){
            return {
                'id': '',
                'nome': '',
                'idade': '',
                'endereco': '',
                'email': '',
            };
        }
        // Exibe Edição
        function set_form_values(d){
            $('#id').val(d['id']);
            $('#nome').val(d['nome']);
            $('#idade').val(d['idade']);
            $('#endereco').val(d['endereco']);
            $('#email').val(d['email']);
        }
        // Obtem valores para submição
        function get_form_value(){
            return {
                'nome': $('#nome').val(),
                'idade': $('#idade').val(),
                'endereco': $('#endereco').val(),
                'email': $('#email').val(),
            };
        }
        // Monta linha da tabela
        function editLine(id, dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            var col = $('#l_'+id+'>td');
            col[0].innerText = dado['id'];
            col[1].innerText = dado['nome'];
            col[2].innerText = dado['idade'];
            col[3].innerText = dado['endereco'];
            col[4].innerText = dado['email'];
        }
        // Monta linha da tabela
        function addLine(dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            line =
                '<tr id="l_'+dado['id']+'">'
                    + '<td>'+dado['id']+'</td>'
                    + '<td>'+dado['nome']+'</td>'
                    + '<td>'+dado['idade']+'</td>'
                    + '<td>'+dado['endereco']+'</td>'
                    + '<td>'+dado['email']+'</td>'
                + '<td><button class="btn btn-info" onclick="formShow('+dado['id']+')">Exibir</button></td>'
                + '<td><button class="btn btn-warning" onclick="showModalPut('+dado['id']+')">Editar</button></td>'
                + '<td><button class="btn btn-danger" onclick="formDestroy('+dado['id']+')">Remover</button></td>'
                + '</tr>';
            $('table').append(line);
        }
    @endcomponent
@endsection
