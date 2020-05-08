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
            'label' => 'Grupo',
            'id' => 'name',
            'back_text' => 'Digite um Grupo',])
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
                    '<tr><td>Nome:</td><td>'+d['name']+'</td></tr>'+
                '</span>'
            )
        }
        // Limpar campos
        function clean_fields(){
            return {
                'id': '',
                'name': '',
            };
        }
        // Exibe Edição
        function set_form_values(d){
            $('#id').val(d['id']);
            $('#name').val(d['name']);
        }
        // Obtem valores para submição
        function get_form_value(){
            return {
                'name': $('#name').val(),
            };
        }
        // Monta linha da tabela
        function editLine(id, dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            var col = $('#l_'+id+'>td');
            col[0].innerText = dado['id'];
            col[1].innerText = dado['name'];
        }
        // Monta linha da tabela
        function addLine(dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            line =
                '<tr id="l_'+dado['id']+'">'
                    + '<td>'+dado['id']+'</td>'
                    + '<td>'+dado['name']+'</td>'
                + '<td><button class="btn btn-info" onclick="formShow('+dado['id']+')">Exibir</button></td>'
                + '<td><button class="btn btn-warning" onclick="showModalPut('+dado['id']+')">Editar</button></td>'
                + '<td><button class="btn btn-danger" onclick="formDestroy('+dado['id']+')">Remover</button></td>'
                + '</tr>';
            $('table').append(line);
        }
    </script>
@endsection
