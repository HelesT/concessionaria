<?php
    require_once("conecta.php");

    $id = $_GET['idCarro'];
    $nomeCarro = $_GET['modelo'];

    $comando = $pdo->prepare("SELECT concessionaria.* FROM concessionaria
    INNER JOIN alocacao ON concessionaria.idConcessionaria = alocacao.Concessionaria_idConcessionaria
    INNER JOIN automoveis ON automoveis.idAutomoveis = alocacao.Automoveis_idAutomoveis
    WHERE alocacao.automoveis.idAutomoveis = :id")
    $comando->bindParam(':id', $id);
    $comando->execute();

    $concessionaria = array();
    while($c = $comando->fetch(PDO::FETCH_ASSOC)){
        array_push($concessionaria, $c);
    }

    $comandoClientes = $pdo->prepare("SELECT clientes.* FROM clientes")
    $comandoClientes->execute();

    $clientes = array();
    while($c = $comandoClientes->fetch(PDO::FETCH_ASSOC)){
        array_push($clientes, $c);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Carros</title>
    <style></style>
</head>
<body>
    <h1>Carro <?= $_GET['modelo']; ?></h1>

    <form action = "venderCarro.php" method = "post">
        <input type = "hidden" name = "idCarro" value = "<?= $id ?>">
        <select name = "idConcessionaria">
            <?php
                foreach($concessionaria as $c){?>
                    <option value = "<?= $c['concessionaria']?>"><?= $c['concessionaria']?></option>
                <?php } ?> 
        </select>
        <select name = "clientes">
            <?php
                foreach($concessionaria as $c){?>
                    <option value = "<?= $c['nome']?>"><?= $c['nome']?></option>
                <?php } ?> 
        </select>
        <button type = "submit">Vender carro</button>
    </form>
</body>
</html>