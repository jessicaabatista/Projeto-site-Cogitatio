  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Minhas Consultas</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="Estilo.css" rel="stylesheet">
  </head>
  
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
$sql = "SELECT * FROM consulta WHERE fk_paciente = " . $_SESSION['id'] . "";
$consultas = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

$teste = mysqli_fetch_array($consultas);

if ($teste != null) {
?>

  <div class="login-page"></div>
  <div class="form2">
  <h5>Suas Consultas</h5>
    <table border="1" align="center">
      <tr>
        <th>    Código   </th>
        <th>   Data da Consulta   </th>
        <th>   Horário   </th>
      </tr>
      <?php
      while ($agenda = mysqli_fetch_array($consultas)) {

        $dataConsulta = date("Y-m-d", strtotime($agenda['data']));
        $today = date("Y-m-d");

        if ($today <= $dataConsulta) {

          echo '<tr><td>        ' . $agenda['id_consulta'] . '</td>';
          echo '<td>        ' . $agenda['data'] . '</td>';
          echo '<td>    ' . $agenda['horario'] . ':00</td>';
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
    <?php
    $sqlMensagem = "SELECT * FROM avisos WHERE fk_paciente = " . $_SESSION['id'] . " ORDER BY id_aviso DESC LIMIT 5";
    $mensagem = mysqli_query($link, $sqlMensagem) or die("Erro ao tentar buscar as informações!");
    $testeAviso = mysqli_fetch_array($mensagem);

    if ($testeAviso != null) {
    ?>
      <h5>Avisos</h5><br>
      <?php
      while ($aviso = mysqli_fetch_array($mensagem)) {
        echo '<p># ' . $aviso['mensagem'] . '</p>';
      }
      ?>
    <?php
    } else {
      echo '<h5>Nenhum aviso para visualizar no momento.</h5><br>';
    }
    ?>
  </div>
  </div>