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
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Minhas Consultas</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form2">
  <p>Suas Consultas</p>
  <table border="1" align="center">
    <tr>
      <th>Código</th>
      <th>Data da Consulta</th>
      <th>Horário</th>
      <th>Psicologo</th>
    </tr>
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {

      $dataConsulta = date("Y-m-d", strtotime($agenda['data']));
      $today = date("Y-m-d");

      if ($today >= $dataConsulta) {

        echo '<tr><td>' . $agenda['id_consulta'] . '</td>';
        echo '<td>' . $agenda['data'] . '</td>';
        echo '<td>' . $agenda['horario'] . ':00</td>';

        $sql = "SELECT nome_psicologo FROM psicologo WHERE id_psicologo = " . $agenda['fk_psicologo'] . "";
        $buscaNome = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
        $nome = mysqli_fetch_array($buscaNome);

        echo '<td>' . $nome['nome_psicologo'] . '</td></tr>';
      }
    }
    ?>
  </table>
</div>
<br>
<br>
<div class="form2">

  <?php
  $sqlMensagem = "SELECT * FROM avisos WHERE fk_paciente = " . $_SESSION['id'] . "";
  $mensagem = mysqli_query($link, $sqlMensagem) or die("Erro ao tentar buscar as informações!");
  $avisos = mysqli_fetch_array($mensagem);
  ?>

  <table border="1" align="center">
    <tr>
      <th>Código</th>
      <th>Mensagem</th>
    </tr>
    <?php
    while ($aviso = mysqli_fetch_array($avisos)) {
      echo '<tr><td>' . $aviso['id_aviso'] . '</td>';
      echo '<td>' . $aviso['mensagem'] . '</td>';
    }
    ?>
  </table>
</div>

</div>