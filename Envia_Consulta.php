<?php
include_once("Barra_Inicial.php");
$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$psicologo = $_POST['psicologo'];
$data = $_POST['data'];
$horario   = $_POST['horario'];
$paciente  = $_POST['paciente'];

$busca = "SELECT count(*) AS cntUser FROM consulta WHERE data = '$data' AND horario = '$horario'";

$resultado = mysqli_query($link, $busca) or die("Erro ao tentar gravar as informações!");
$row = mysqli_fetch_array($resultado);
$count = $row['cntUser'];

if ($count > 0 || $data <= date('Y/m/d')) {

?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <title>Marcar Consulta</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="Estilo.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  </head>

  <div class="login-page"></div>
  <div class="form">
    <p>Horário indisponivel!<br> Por favor tente marcar novamente.</p>
    <input type="button" value="Voltar" class="btn btn-primary btn-lg"  onClick="history.go(-1)">
  </div>
  </div>

<?php

} else if ((empty($_POST['psicologo']) == false) and (empty($_POST['data']) == false) and (empty($_POST['horario']) == false) and (empty($_POST['paciente']) == false)) { //verifica se estão preenchidos

  $sql = "INSERT INTO consulta (`data`, `horario`, `fk_psicologo`, `fk_paciente`) values ('$data', '$horario', '$psicologo', '$paciente')";

  mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Marcar Consulta</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="Estilo.css" rel="stylesheet">
  </head>


  <div class="login-page"></div>
  <div class="form">
    <p>Horário agendado com sucesso!</p>
    <a href="/Marcar_Consulta.php">
      < Voltar para página anterior</a>
  </div>
  </div>

<?php

} else {
  echo "Dados não preenchidos";
}

?>