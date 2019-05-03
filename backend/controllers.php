<?php

class Loja{
        function cadastrarEnd($rua,$bairro,$cidade,$numero){
            include('connection.php');
            
            try{
                
                 $mysql->query("INSERT INTO endereco (rua,bairro,cidade,numero) VALUES ('$rua','$bairro','$cidade','$numero');");
                
            }catch(Exception $e){
                echo "<script>alert($e)</script>";
            }
        
        }

        function ultimoIDEndereco(){
           include('connection.php');   
            
            try{
                
                $query = $mysql->query("SELECT max(id) as id from endereco;");
                $d = $query->fetch_array();
                return $d['id'];
            

            }catch(Exception $e){
                echo "<script>alert($e)</script>";
            }
            return 0;
        }

        function cadastrarUsuario($cpf,$nome,$email,$rua,$bairro,$cidade,$numero,$usuario,$senha){
            include('connection.php');
            
            $this->cadastrarEnd($rua,$bairro,$cidade,$numero);
            $ultID = $this->ultimoIDEndereco();
            try{        

                $mysql->query("INSERT INTO clientes (cpf,nome,email,codEnd,username,pass) VALUES ('$cpf','$nome','$email','$ultID','$usuario','$senha');");

            }catch(Exception $e){
                echo "<script>alert($e)</script>";
            }
            header("Location: index.php");
        }
        
        function cadastrarProduto($nome,$desc,$caminhoIMG,$preco,$qtdEstoque,$categoria){
            include('connection.php');
            try{
                $img = $caminhoIMG['name'];
                $mysql->query("INSERT into produtos (nome,dsc,srcImage,price,stock,category) values ('$nome','$desc','$img','$preco',$qtdEstoque,'$categoria');");
                $this->salvarImg($caminhoIMG);
                echo "<script>alert('Cadastrado com sucesso!')</script>";
            }catch(Exception $e){
                echo "<script>alert('$e')</script>";
            }
            header("Location: ../index.php");
            
        }
        
        function signinAdm($email,$senha){
            include('connection.php');
            $query = $mysql->query("SELECT * from users_adm where email='$email' and pass='$senha';");
            $row   = $query->num_rows;            
            if($row > 0){
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
        }

        function signin($email,$senha){
            include('connection.php');
            $query = $mysql->query("SELECT * from clientes where email='$email' and pass='$senha';");
            $row   = $query->num_rows;
            if($row > 0){
                session_start();
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
        }
        
        function signupAdm($email,$senha){
            include('connection.php');
            try{
                $mysql->query("INSERT into users_adm (email,pass) values ('$email','$senha');");
            }catch(Exception $e){
                echo "<script>alert('$e')</script>";
            }
        }
        
        function logout(){
            session_destroy();
            header("Location: login.php");
        }
        
        function atualizarQuantidadeStock($id, $qtd){
            include('connection.php');
            try{
                $mysql->query("UPDATE produtos set stock = stock - $qtd where id = $id;");
                echo "<script>alert('Comprado!'); location.href='index.php';</script>";
            }catch(Exception $e){
                echo "<script>alert('$e')</script>";
            }
        }

        function salvarImg($arquivo){
            $destino = '../img/' . $arquivo['name'];
            $arquivo_tmp = $arquivo['tmp_name'];
            move_uploaded_file( $arquivo_tmp, $destino  );
        }

    }
