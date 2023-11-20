<?php
    require_once("conecta.php");

    $id = $_POST['id'];
    $comando = $pdo->prepare("SELECT * FROM alocacao WHERE area = :id AND quantidade > 0");
    $comando->bindParam(':id',$id);
    $comando->execute();
    
    $linhas = $comando->rowCount();
    echo $linhas;
?>