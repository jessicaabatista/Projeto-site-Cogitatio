<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php

    if ($_SESSION["psicologo"] != "") {
        echo "Tipo de Usuário  " . $_SESSION["psicologo"] . ".<br>";
        echo "GGGGGGGGGGGGG  " . $_SESSION["geral"] . ".<br>";
        echo "Id Usuario  " . $_SESSION['id'] . ".";
    } else {
        echo "ninguém tá logado meu parceiro";
    }
    ?>
    <br><br><br>

    <?php
    if ($_SESSION["paciente"] != "") {
        echo "Tipo de Usuário  " . $_SESSION["paciente"] . ".<br>";
        echo "GGGGGGGGGGGGG  " . $_SESSION["geral"] . ".<br>";
        echo "Id Usuario  " . $_SESSION['id'] . ".";
    } else {
        echo "ninguém tá logado meu parceiro";
    }
    ?>
    <br><br><br>

    <?php
    if ($_SESSION["funcionario"] != "") {
        echo "Tipo de Usuário  " . $_SESSION["funcionario"] . ".<br>";
        echo "GGGGGGGGGGGGG  " . $_SESSION["geral"] . ".<br>";
        echo "Id Usuario  " . $_SESSION['id'] . ".";
    } else {
        echo "ninguém tá logado meu parceiro";
    }

    ?>

</body>

</html>