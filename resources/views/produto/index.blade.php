@extends('partial.header')

@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h4>Cadastro de Produtos</h4>
    </div>
    <div class="panel-body">

        <div class="pull-right">
            <button class="btn btn-info btn-small"  id="btn-cadastrar-produto"><i class="fa fa-plus"></i>Cadastrar</button>
        </div>

        @if(count($produtos) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preco</th>
                    <th>Acoes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $prod)
                    <tr>
                        <th scope="row">{{ $prod->name }}</th>
                        <td>R$ {{ $prod->price }}</td>
                        <td width="100" class="-align-right">
                            <a data="{{ json_encode($prod) }}" class="btn btn-editar-produto btn-success" href="javascript:void(0)">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a data="{{ json_encode($prod) }}" class="btn btn-remover-produto btn-danger" href="javascript:void(0)">
                                <i class="fa fa-close"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-offset-5">
                    <?php echo $produtos->render(); ?>
                </div>
            </div>
        @else
            <div class="pull-left">
                <div class="alert alert-info">
                    Nenhum produto cadastrado
                </div>
            </div>
        @endif

    </div>
</div>

<div class="modal fade" id="modalFormProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="form" id="formCadProdutoAction" action="" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <input type="hidden" name="code" id="code">
                        <input type="hidden" name="_METHOD" id="method">

                        {{ csrf_field() }}

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                            <input id="name" type="text" required class="form-control" name="name" placeholder="Nome do produto">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input id="price" type="text" required class="form-control price" name="price" placeholder="Preco">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button id="btn-salvar" type="submit" class="btn btn-primary">Salvar</button>
                    <button style="display: none;" id="btn-atualizar" type="submit" class="btn btn-info">Atualizar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalRemoverProdConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comfirmacao</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente remover o produto <b id="nome_produto"></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NAO</button>
                <a href="javascript:void(0)" id="btn-confirmando-remocao" class="btn btn-warning">SIM</a>
            </div>
        </div>
    </div>
</div>


<script type="application/javascript">
    $(function(){

        $(".price").maskMoney();

        $("#btn-confirmando-remocao").click(function(){
            $('#modalRemoverProdConfig').loading({
                message: 'Removendo...'
            });
        });

        $("#formCadProdutoAction").submit(function(){
            $('#modalFormProduto').loading({
                message: 'Salvando, aguarde...'
            });
        });

        $(".btn-remover-produto").click(function(){
            var data = JSON.parse($(this).attr('data'));
            $("#nome_produto").html(data.name);
            var URL = "/produto/remover/"+data.id;
            $("#btn-confirmando-remocao").attr("href", URL);
            $('#modalRemoverProdConfig').modal('show');
        });

        $(".btn-editar-produto").click(function(){
            var data = JSON.parse($(this).attr('data'));

            var URL = "/produto/atualizar/"+data.id;

            $("#formCadProdutoAction").attr("action", URL);
            $("#method").val("PUT");
            $("#code").val(data.id);
            $("#name").val(data.name);
            $("#price").val(data.price);

            $('#modalFormProduto').modal('show');

            $("#btn-salvar").hide();
            $("#btn-atualizar").show();
        });

        $("#btn-cadastrar-produto").click(function(){

            var URL = "/produto/cadastrar";

            $("#formCadProdutoAction").attr("action", URL);

            $("#code").val("");
            $("#name").val("");
            $("#price").val("");
            $("#method").val("");

            $('#modalFormProduto').modal('show');

            $("#btn-salvar").show();
            $("#btn-atualizar").hide();
        });
    });
</script>

@endsection

@extends('partial.footer')