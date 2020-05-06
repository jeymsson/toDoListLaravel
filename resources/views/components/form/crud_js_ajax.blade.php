<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $(document).ready(function() {
        formIndex();
        $("#post").hide();
        $("#put").hide();
    });
    // Oculta forms
    function backFormModal(){
        $("#{{$form_modal}}").hide(250);
        $("#post").hide();
        $("#put").hide();
        set_form_values(clean_fields());
    }
    // Exibe Criação
    function showModalPost(){
        $('#{{$form_modal}}').show(250);
        $("#post").show();
    }
    // Exibe Edição
    function showModalPut(id){
        $('#{{$form_modal}}').show(250);
        $("#put").show();

        id = (id != null) ? id : '';
        $.getJSON('{{$route}}'+id, function(d){
            set_form_values(d);
        });
    }
    // Busca dados para tabela
    function formIndex(){
        $.getJSON('{{$route}}', function(d){
            for(i = 0; i < d.length; i++){
                addLine(d[i]);
            }
        });
    }
    // Realiza criação
    function formPost(){
        let store = get_form_value();
        $.post('{{$route}}', store, function(d){
            addLine(d);
        });
        $('#{{$form_modal}}').hide(250);
    }
    // Realiza edição
    function formUpdate(){
        let put = get_form_value();
        let id = $('#id').val();
        $.ajax({
            type: 'PUT',
            url: '{{$route}}'+id,
            context: this,
            data: put,
            success: function(d){
                editLine(id, d)
                backFormModal()
            },
            error: function(error){
                console.log(error)
            }
        });
    }
    // Realiza remoção
    function formDestroy(value){
        $.ajax({
            type: 'DELETE',
            url: '{{$route}}'+value,
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
    // Exibe detalhado
    function formShow(id){
        $('#modal_show').show(200);
        $('span#show_rem').remove()
        id = (id != null) ? id : '';
        $.getJSON('{{$route}}'+id, function(d){
            show_exibition(d)
        });
    }
    /*
        function show_exibition(d){
            return alert('show_exibition(): Necessario implementar.');
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
            return alert('clean_fields(): Necessario implementar.');
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
            return alert('set_form_values(): Necessario implementar.');
            $('#id').val(d['id']);
            $('#nome').val(d['nome']);
            $('#quantidade').val(d['quantidade']);
            $('#preco').val(d['preco']);
            $('#departamento').val(d['departamento']);
        }
        // Obtem valores para submição
        function get_form_value(){
            return alert('get_form_value(): Necessario implementar.');
            return {
                'nome': $('#nome').val(),
                'quantidade': $('#quantidade').val(),
                'preco': $('#preco').val(),
                'departamento': $('#departamento').val(),
            };
        }
        // Monta linha da tabela
        function editLine(id, dado){
            return alert('editLine(): Necessario implementar.');
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
            return alert('addLine(): Necessario implementar.');
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
    */
</script>
