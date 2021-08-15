<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Controle de Desenvolvedores</title>
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Meu css -->
  <link rel="stylesheet" href="css/index.css">
</head>
<header>
    <img src="img/gazin.png">
    <h1>CONTROLE DE DESENVOLVEDORES</h1>
</header>
<main>
  <div class = "div-cadastro">
    <h3>Cadastrar Novo Desenvolvedor</h3>
    <form action = 'create.php' method = 'post'>
        Nome: <input type = 'text' name = 'nome' id = 'nome' /> <br><br>
        Sexo: <input type = 'text' name = 'sexo' id = 'sexo' /> <br> <br>
        Idade: <input type = 'text' name = 'idade' id = 'idade' /> <br> <br>
        Hobby: <input type = 'text' name = 'hobby' id = 'hobby' /> <br><br>
        Dt Nasc: <input type = 'date' name = 'dtnascimento' id = 'dtnascimento' /><br>
        <input type = 'submit' id = 'btn-enviar' value = 'Enviar'>   
    </form>
  </div>
  <hr>
  <div class = "div-tabela">
    <h3>Listagem dos Desenvolvedores Cadastrados</h3>

    <!-- Iniciando o PHP -->
    <?php
    include_once "conexao.php";
    try {
        //Consulta que retornará todas as pessoas já cadastradas no banco
        $consulta = $conexao->query("SELECT * FROM pessoas");
        //Criando a tabela
        echo "<table border = '2'> 
               <tr>
                <td>Nome</td>
                <td>Sexo</td>
                <td>Idade</td>
                <td>Hobby</td>
                <td>Dt Nasc</td>
                <td>Ações</td>
               </tr>";

        //Laço de repetição que percorre todos os registros da consulta
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){

        echo "<tr>
                  <td>$linha[nome]</td>
                  <td>$linha[sexo]</td>
                  <td>$linha[idade]</td>
                  <td>$linha[hobby]</td>
                  <td>$linha[dtnascimento]</td>
                  <td><a href = 'formEditar.php?id=$linha[id]'>Editar</a> - <a href = 'delete.php?id=$linha[id]'>Excluir</a></td>
              </tr>";
        }
        echo "</table>";
        echo "<br>Total de registros: " . $consulta->rowCount();

    }catch (PDOException $e){
        echo $e->getMessage();
        }
    ?>
   </div>
</main>
<footer>@Copyright 2020-2021 </footer>
</html>