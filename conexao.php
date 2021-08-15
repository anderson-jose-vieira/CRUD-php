<?php

try{
    //Realizando a conexão com o Banco
    $conexao = new pdo("mysql:host=localhost;port=3306;dbname=desenvolvedores;", "root", "");
}catch (PDOException $e){
    echo 'Falha na conexão com o banco: '. $e->getMessage();
}

//Verificando se existe a tabela pessoas.
$table = 'pessoas';
$tableExists = $conexao->query("SHOW TABLES LIKE '$table'")->rowCount() > 0;

//Se a tabela não existe, será criada.
if($tableExists == ""){
    $sql = "CREATE TABLE pessoas(
        id           INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome         VARCHAR(50) NOT NULL,
        sexo         VARCHAR(1) NOT NULL,
        idade        INTEGER,
        hobby        VARCHAR(100) NOT NULL,
        dtnascimento DATE NOT NULL)
        ";

    if ($conexao->query($sql) === TRUE) {
        echo "Tabela PESSOAS criada com sucesso!";
    } else {
    echo "Erro: " . $conexao->error;
    }
}
?>