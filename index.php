<?php
include "./database/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <br>
    <?php
    $objBD = new BD();
    $objBD->conn(); //abre a conexão
    $result = $objBD->select(); // retorna um array com os dados do bd
    foreach ($result as $item) {
        echo "ID:" . $item['id'] . " Nome: " . $item['nome'] . "<br>";
    }

    if (!empty($_POST)) {
        echo "Salvar<br>";
        var_dump($_POST);
        $objBD->inserir($_POST);
        header("Location:index.php");
    }

    ?>

<h2>Formulário Cliente</h2>
    <form action="index.php" method="post">
        <label for="nome">Nome:</label></br>
        <input type="text" id="id" name="nome"></br>
        <label>Telefone:</label></br>
        <input type="text" id="id1" name="telefone" placeholder="(49)99999-9999"></br>
        <lablel for="cpf">CPF:</lablel></br>
        <input type="text" id="id2" name="cpf" placeholder="000.000.000.00"><br></br>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>
