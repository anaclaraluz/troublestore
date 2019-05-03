<?php
include('backend/connection.php');
include('backend/controllers.php');
session_start();
if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="img/head1.png"/> 
    <title>Trouble Store</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color: white;">
            <img src = "img/logo.png">
        </a>
        <form method="get" action="">
            <button class="btn btn-light my-2 my-sm-0" name="sair" type="submit">Sair</button>
        </form>
    </nav>
    <div class="container" style="padding-top: 20px;">
        <form method="post" action="">
            <div class="row">
                <?php
                $query = $mysql->query("SELECT * from produtos;");
                $row   = $query->num_rows;

                if ($row > 0) {
                    while ($dados = $query->fetch_array()) {
                        ?>
                        <div class="col-sm-4">
                            <div class="card" style="width: 18rem;">

                                <img width="250" height="250" src="img/<?php echo $dados['srcImage']; ?>" class="card-img-top" alt="trouble">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $dados['nome']; ?></h5>
                                    <p class="card-text"><?php echo $dados['dsc']; ?><br>
                                        <?php echo "Quantidade em estoque: " . $dados['stock']; ?><br>
                                        <?php echo "Preço: " . $dados['price']; ?><br>
                                    </p>
                                    
                                    <button class= "btn-lg btn-dark btn-block" type="submit" name="comprar">Comprar</button>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
            ?>
            </div>
        </form>
    </div>
</body>

</html>

<?php
    $loja = new Loja();
    if (isset($_GET['sair'])) {
        $loja->logout();
    }
    if(isset($_POST['comprar'])){
        $loja->atualizarQuantidadeStock($_POST['id'],$_POST['qtd']);
    }
?>