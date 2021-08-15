<?php
include_once "conexao.php";

try {
    $nome = filter_var($_POST['nome']);
    $sexo = filter_var($_POST['sexo']); 
    $idade = filter_var($_POST['idade']);
    $hobby = filter_var($_POST['hobby']);
    $dtnascimento = filter_var($_POST['dtnascimento']);

    //Preparando para inserir os novos dados
    $insert = $conexao->prepare("INSERT INTO pessoas (nome, sexo, idade, hobby, dtnascimento) VALUES (:nome, :sexo, :idade, :hobby, :dtnascimento)");
    
    //Usando bindParam para dificultar a entrada de SQL Injection
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':sexo', $sexo);
    $insert->bindParam(':idade', $idade);
    $insert->bindParam(':hobby', $hobby);
    $insert->bindParam(':dtnascimento', $dtnascimento);
    $insert->execute();

    header("location: index.php");

}catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();
}

?>