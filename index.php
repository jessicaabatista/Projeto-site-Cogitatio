<?php
include_once("Barra_Inicial.php");
// inicia e destroi a sessão 
session_start();
session_destroy();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>COGITATION</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="index.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>

<div class="text-center">
    <br><br><br><br><br><br><br><br><br>
    <h1>COGITATION</h1>
    <div>
        <h3>Marque suas consultas</h3>
        <br>
        <a href="Login_Paciente.php">
            <button type="button" class="btn btn-outline-light btn-lg"> Login </button>
        </a>
        <a href="Cadastro_Paciente.php">
            <button type="button" class="btn btn-primary btn-lg">Cadastro</button>
        </a>
    </div>
</div>