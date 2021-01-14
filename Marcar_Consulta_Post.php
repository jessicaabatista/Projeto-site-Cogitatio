<?php
session_start();
if ($_SESSION["geral"] != "psicologologado" && $_SESSION["geral"] != "funcionariologado") {
  header('Location: logout.php');
}

if ($_SESSION["geral"] = "psicologologado") {
  include_once("Barra_Psicologo.php");
}elseif($_SESSION["geral"] = "funcionariologado"){
  include_once("Barra_Funcionario.php");
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$data = $_POST['data'];
$horario   = $_POST['horario'];
$paciente  = $_POST['paciente'];

$busca = "SELECT count(*) AS cntUser FROM consulta WHERE data = '$data' AND horario = '$horario'";

$resultado = mysqli_query($link, $busca) or die("Erro ao tentar gravar as informações!");
$row = mysqli_fetch_array($resultado);
$count = $row['cntUser'];

$dataConsulta = date("Y-m-d", strtotime($data));
$today = date("Y-m-d");

if ($count > 0 || $today >= $dataConsulta) {
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
    <p>Horário indisponivel!<br> Por favor tente marcar novamente.</p>
    <input type="button" value="Voltar" class="btn btn-primary btn-lg" onClick="history.go(-1)">
  </div>
  </div>

<?php

} else if ((empty($_POST['data']) == false) and (empty($_POST['horario']) == false) and (empty($_POST['paciente']) == false)) { //verifica se estão preenchidos

  $sqlPsicologo = "SELECT psi.id_psicologo FROM psicologo psi
  INNER JOIN paciente p ON p.fk_psicologo = psi.id_psicologo AND p.id_paciente = " . $paciente . "";
  $psicologo = mysqli_query($link, $sqlPsicologo) or die("Erro ao tentar gravar as informações!");
  $psicologoArray = mysqli_fetch_array($psicologo);
  $psicologoEscolhido = $psicologoArray['id_psicologo'];

  $sql = "INSERT INTO consulta (`data`, `horario`, `fk_psicologo`, `fk_paciente`) values ('$data', '$horario', '$psicologoEscolhido', '$paciente')";
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
    <input type="button" value="Voltar" class="btn btn-primary btn-lg" onClick="history.go(-1)">
  </div>
  </div>

<?php
} else {
  echo "Dados não preenchidos";
}
?>