<?php
    require('../backend/connection.php');
    require('../backend/controllers.php');
    session_start();
    if(isset($_SESSION['logado']) && $_SESSION['logado']){
       // header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="../img/head1.png"/> 
</head>

<body class="text-center">
    <form action="" class="form-signin" method="post">
        <img class="mb-4" src="../img/head1.png" alt="" width={200} />
        <h2>Painel de Controle</h2>
        <label class="sr-only" for="inputEmail">Endereço de email</label>
        <input class="form-control" type="email" name="inputEmail" id="inputEmail" placeholder="Seu email" required autofocus />
        <label class="sr-only" for="inputPassword">Senha</label>
        <input class="form-control" type="password" name="inputPass" id="inputPassword"placeholder="Senha" required />
        
        <button class="btn btn-lg btn-dark btn-block" type="submit" name="acessar">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</body>

</html>

<?php
    $loja = new Loja();
    if(isset($_POST['acessar'])){
        $loja->signupAdm($_POST['inputEmail'],md5($_POST['inputPass']));
    }
?>