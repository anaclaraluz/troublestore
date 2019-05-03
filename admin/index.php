<?php
include('../backend/connection.php');
include('../backend/controllers.php');
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
   header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <title>Teste</title>
</head>

<body>
    <nav class="navbar navbar-light bg-primary">
        <a class="navbar-brand" style="color: white;">TROUBLE STORE</a>
        <h2 style="color:white;">Painel de Controle</h2>
        <form method="get" action="">
            <button class="btn btn-outline-danger my-2 my-sm-0" name="sair" type="submit">Sair</button>
        </form>
    </nav>
    <div class="container" style="padding-top: 20px;">
        <h2>Cadastro de Produtos</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputNome4" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDesc">Descrição</label>
                    <input type="text" name="desc" class="form-control" id="inputDesc" placeholder="Descrição">
                </div>
            </div>
            <div class="form-group">
                <label for="inputImg">Imagem</label>
                <input type="file" name="img" class="form-control" id="inputImg">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="preco">Preço</label>
                    <input type="text" name="preco" class="form-control" id="preco" value="R$ ">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCat">Categoria</label>
                    <select name="categoria" id="inputCat" class="form-control">
                        <option selected>Escolha...</option>
                        <option value="c">Camisa</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="qtdEstoque">Quantidade do Estoque</label>
                    <input type="text" name="qtdEstoque" class="form-control" id="qtdEstoque">
                </div>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

</html>

<?php
    $loja = new Loja(); //mudar a variavel
    if (isset($_GET['sair'])) {
        $loja->logout();
    }
    if (isset($_POST['cadastrar'])){
        $loja->cadastrarProduto($_POST['nome'],$_POST['desc'],$_FILES['img'],$_POST['preco'],$_POST['qtdEstoque'],$_POST['categoria']);
    }
?>