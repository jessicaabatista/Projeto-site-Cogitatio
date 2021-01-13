<?php
// carrega a barra do paciente
include_once("Barra_Paciente.php");
// retomando a sessão criada
session_start();
// checa se o usuário logado é um paciente, caso contrário, derireciona para o logout
if ($_SESSION["paciente"] != "pacientelogado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$data = $_POST['data'];
$horario = $_POST['horario'];
$paciente = $_POST['id'];

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
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  </head>

  <div class="login-page"></div>
  <div class="form">
    <p>Horário indisponivel!<br> Por favor tente marcar novamente.</p>
    <input type="button" value="Voltar" class="btn btn-primary btn-lg" onClick="history.go(-1)">
  </div>
  </div>

<?php

} else if ((empty($_POST['data']) == false) and (empty($_POST['horario']) == false)) { //verifica se estão preenchidos

  $sqlPsicologo = "SELECT psi.id_psicologo FROM psicologo psi
  INNER JOIN paciente p ON p.fk_psicologo = psi.id_psicologo AND p.id_paciente = ". $paciente ."";
  $result = mysqli_query($link, $sqlPsicologo) or die("Erro ao tentar gravar as informações!");
  $rowPsicologo = mysqli_fetch_array($result);
  $psicologo = $rowPsicologo['id_psicologo'];
  
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
    <a href="Inicial_Paciente.php">
            <button type="button" class="btn btn-primary btn-lg">Minhas Consultas</button>
        </a>
  </div>
  </div>

<?php

} else {
  echo "Dados não preenchidos";
}

?>