<?php
    include('backend/connection.php');
    include('backend/controllers.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="icon" href="img/head1.png"/> 
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="serviceCadastro.php">
        <img class="mb-4" src="img/head1.png" alt="" width={200} />
        <h1>Cadastro</h1>
        <input type="text" class="form-control" name="cpf" placeholder="CPF" required>
        <input type="text" class="form-control" name="nome" placeholder="Nome completo" required>
        <input type="email" class="form-control" name="email"  placeholder="Email" required>
        <input type="text" class="form-control" name="rua" placeholder="Rua" required>
        <input type="text" class="form-control" name="bairro" placeholder="Bairro" required>
        <input type="text" class="form-control" name="cidade" placeholder="Cidade" required>
        <input type="number" class="form-control" name="numero" placeholder="Numero" required>
        <input type="text" class="form-control" name="user" placeholder="Usuário" required>
        <input type="password" class="form-control" name="pass" placeholder="Senha" required>
        <button type="submit" class="btn btn-lg btn-dark btn-block" name="cadastrar">Cadastrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        <a href="login.php">Voltar</a>
    </form>
</body>
</html>