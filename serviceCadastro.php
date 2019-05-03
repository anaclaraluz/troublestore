<?php

    require("backend/controllers.php");
    $loja = new Loja();
    
    $loja->cadastrarUsuario($_POST['cpf'],$_POST['nome'],$_POST['email'],$_POST['rua'],$_POST['bairro'],$_POST['cidade'],$_POST['numero'],$_POST['user'],md5($_POST['pass']));
    
    header('Location: cadastro.php');
        