<?php
include_once "conexao.php";

try {
    //Para garantir que seja um numero inteiro, vou usar o filter_var
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome']);
    $sexo = filter_var($_POST['sexo']); 
    $idade = filter_var($_POST['idade']);
    $hobby = filter_var($_POST['hobby']);
    $dtnascimento = filter_var($_POST['dtnascimento']);

    //Preparando para editar os novos dados
    $update = $conexao->prepare("UPDATE pessoas SET nome = :nome, sexo = :sexo, idade = :idade, hobby = :hobby, dtnascimento = :dtnascimento WHERE id = :id");
    
    //Usando bindParam para dificultar a entrada de SQL Injection
    $update->bindParam(':id', $id);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':sexo', $sexo);
    $update->bindParam(':idade', $idade);
    $update->bindParam(':hobby', $hobby);
    $update->bindParam(':dtnascimento', $dtnascimento);
    $update->execute();

    header("location: index.php");

}catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();
}

?>