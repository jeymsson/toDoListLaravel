@extends('layouts.index', ['current' => $current ?? null])
@section('title', $title)
@section('content')
    @component('components.form.card', ['title'=>$title])
        @component('components.form.a_button', ['onclick' => 'novoProduto()'])
            Novo registro
        @endcomponent

        @component('components.rel.table', ['head' => $tabela, 'class'=> 'table-dark'])
        @endcomponent
    @endcomponent
@endsection
@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        $(document).ready(function() {
            indexClientes();

        });
        function backmodal(){
            $("#modal_crud").hide(250);
            $("#post").hide();
            $("#put").hide();
            $('#id').val('');
            $('#nome').val('');
            $('#quantidade').val('');
            $('#preco').val('');
            $('#departamento').val('');
        }
        function novoProduto(){
            $('#modal_crud').show(250);
            $("#post").show();
        }
        function postProduto(){
            let store = {
                'nome': $('#nome').val(),
                'quantidade': $('#quantidade').val(),
                'preco': $('#preco').val(),
                'departamento': $('#departamento').val(),
            };
            $.post('api/product', store, function(d){
                addLine(d);
            });
            $('#modal_crud').hide(250);
        }
        function montaClientes(){
            $.getJSON('api/client', function(d){
                for(i = 0; i < d.length; i++){
                    $('#prod').prepend('<option value="'+d[i]['id']+'">'+d[i]['nome']+'</option>');
                }
            });
        }
        function addLine(dado){
            dado = (typeof dado) === 'string' ? JSON.parse(dado) :dado;
            line =
                '<tr id="l_'+dado['id']+'">'+
                    '<td>'+dado['id']+'</td>'+
                    '<td>'+dado['nome']+'</td>'+
                    '<td>'+dado['quantidade']+'</td>'+
                    '<td>'+dado['preco']+'</td>'+
                    '<td>'+dado['departamento']+'</td>'+
                    '<td><button class="btn btn-info" onclick="exibir('+dado['id']+')">Exibir</button></td>'+
                    '<td><button class="btn btn-warning" onclick="editar('+dado['id']+')">Editar</button></td>'+
                    '<td><button class="btn btn-danger" onclick="apagar('+dado['id']+')">Remover</button></td>'+
                '</tr>';
            $('table').append(line);
        }
        function indexClientes(){
            $.getJSON('api/product', function(d){
                for(i = 0; i < d.length; i++){
                    addLine(d[i]);
                }
            });
        }
        function exibir(id){
            $('#modal_show').show(200);
            $('span#show_rem').remove()
            id = (id != null) ? id : '';
            $.getJSON('api/product/'+id, function(d){
                $('span#show_add').prepend(
                    '<span id=show_rem><table>'+
                        '<tr><td>Id:</td><td>'+d['id']+'</td></tr>'+
                        '<tr><td>Nome:</td><td>'+d['nome']+'</td></tr>'+
                        '<tr><td>Quantidade:</td><td>'+d['quantidade']+'</td></tr>'+
                        '<tr><td>Preco:</td><td>'+d['preco']+'</td></tr>'+
                        '<tr><td>Departamento:</td><td>'+d['departamento']+'</td></tr>'+
                    '</span>'
                )
            });
        }
        function editar(id){
            $('#modal_crud').show(250);
            $("#put").show();

            id = (id != null) ? id : '';
            $.getJSON('api/product/'+id, function(d){
                $('#id').val(d['id']);
                $('#nome').val(d['nome']);
                $('#quantidade').val(d['quantidade']);
                $('#preco').val(d['preco']);
                $('#departamento').val(d['departamento']);
            });
        }
        function update(){
            let put = {
                'nome': $('#nome').val(),
                'quantidade': $('#quantidade').val(),
                'preco': $('#preco').val(),
                'departamento': $('#departamento').val(),
            };
            let id = $('#id').val();
            $.ajax({
                type: 'PUT',
                url: 'api/product/'+id,
                context: this,
                data: put,
                success: function(d){
                    $('#l_'+$('#id').val()).remove();
                    addLine(d);
                    backmodal()
                },
                error: function(error){
                    console.log(error)
                }
            });
        }
        function apagar(value){
            $.ajax({
                type: 'DELETE',
                url: 'api/product/'+value,
                context: this,
                success: function(){
                    $('#l_'+value).remove();
                },
                error: function(error){
                    console.log(error)
                }
            });
            '';
        }
    </script>

@endsection
