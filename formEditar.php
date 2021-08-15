<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Controle de Desenvolvedores</title>
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" href="css/index.css">
</head>
<header>
    <img src="img/gazin.png">
     <h1>Editando o cadastro</h1>
 </header>  
<main>
   <?php
   include_once "conexao.php";

    //Para garantir que seja um numero inteiro.
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //Criando a consulta SQL
    $consulta = $conexao->query("SELECT * FROM pessoas WHERE id = '$id'");
    //Pegando o resultado da consulta
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
   ?>

    <div class = "div-editar">
        <form action = "update.php" method = "post">
            Nome: <input type = "text" name = "nome" value="<?php echo $linha['nome'] ?>" id = "nome" /> <br><br>
            Sexo: <input type = "text" name = "sexo" value="<?php echo $linha['sexo'] ?>" id = "sexo" /> <br><br> 
            Idade: <input type = "text" name = "idade" value="<?php echo $linha['idade'] ?>" id = "idade" /> <br><br>
            Hobby: <input type = "text" name = "hobby" value="<?php echo $linha['hobby'] ?>" id = "hobby" /> <br><br>
            Dt Nasc: <input type = "date" name = "dtnascimento" value="<?php echo $linha['dtnascimento'] ?>" id = "dtnascimento" /> <br>  
            <input type = "hidden" name = "id" value="<?php echo $linha['id'] ?>" > 
            <input type = "submit" id = "btn-editar" value = "Salvar">   
        </form>
    </div>
</main>
</html>