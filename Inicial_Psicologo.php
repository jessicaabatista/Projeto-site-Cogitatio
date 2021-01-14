<?php
include_once("Barra_Psicologo.php");
// retomando a sessão criada:
session_start();

if ($_SESSION["psicologo"] != "psicologologado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM consulta WHERE fk_psicologo = " . $_SESSION['id'] . "";
$consultas = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

$teste = mysqli_fetch_array($consultas);
  
if ($teste != null){
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Agenda</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form2">
  <p>Agenda</p>
  <table border="1" align="center">
    <tr>
      <th>  Código  </th>
      <th>          Data   </th>
      <th> Horário </th>
      <th>               Paciente</th>
    </tr>
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {

      $dataConsulta = date("Y-m-d", strtotime($agenda['data']));
      $today = date("Y-m-d");

      if ($today <= $dataConsulta) {

        echo '<tr><td>      ' . $agenda['id_consulta'] . ' </td>';
        echo '<td>    ' . $agenda['data'] . '    </td>';
        echo '<td>   ' . $agenda['horario'] . ':00</td>';

        $sql = "SELECT nome_paciente FROM paciente WHERE id_paciente = " . $agenda['fk_paciente'] . "";
        $buscaNome = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
        $nome = mysqli_fetch_array($buscaNome);

        echo '<td>        ' . $nome['nome_paciente'] . '        </td></tr>';
      }
    }
    ?>
  </table>
  
  <?php
  }else{
  ?>
  <br><br><br><br>
  <div class="form2">
  <h5>Nenhuma consulta para visualizar no momento.</h5><br>
  <?php 
  }
  ?>
  </div>

<div class="form2">
  <form method="POST" action="Deletar_Consulta.php">
    <p>Digite o código da consulta que deseja cancelar:</p>
    <input type="number" name="consulta" />
    <input type="submit" value="Excluir" id="excluir" name="excluir">
  </form>
</div>
</div>