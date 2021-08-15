<?php
include_once "conexao.php";

try {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //Preparando para deletar a informação
    $delete = $conexao->prepare("DELETE FROM pessoas WHERE id = :id");
    
    //Usando bindParam para dificultar a entrada de SQL Injection
    $delete->bindParam(':id', $id);
    $delete->execute();

    header("location: index.php");

}catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();
}

?>