<?php
    include('backend/connection.php');
    include('backend/controllers.php');
    session_start();
    if(isset($_SESSION['logado']) && $_SESSION['logado']){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/head1.png"/> 
</head>

<body class="text-center">
    <form class="form-signin" action="" method="post">
        <img class="mb-4" src="img/head1.png" alt="" width={200} />
        <h1>Entrar</h1>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus />
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Senha" required />
     
        <button class="btn btn-lg btn-dark btn-block" name="log" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        <span>Não tem conta? <a href="cadastro.php">Cadastre-se!</a></span>
    </form>
</body>

</html>

<?php
    $loja = new Loja();
    if (isset($_POST['log'])) {
        $loja->signin($_POST['email'],md5($_POST['pass']));
    }
?>