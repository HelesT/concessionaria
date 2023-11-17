<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionaria</title>
</head>

<style>
    body{
        background-color: black
    }
</style>


<body>
    <?php
        require_once("PHP/conecta.php");
        if(isset($_GET["id"])==true){
            echo "<script>coloreArea(".$_GET['id'].");</script>";
        }
    ?>

    <main id="patio">
        <div id="area1" class="areas"
        onclick="ExbivirArea('1')">ÁREA 1</div>
        <div id="area2" class="areas"
        onclick="ExbivirArea('2')">ÁREA 2</div> 
        <div id="area3" class="areas"
        onclick="ExbivirArea('3')">ÁREA 3</div> 
    </main>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</html>