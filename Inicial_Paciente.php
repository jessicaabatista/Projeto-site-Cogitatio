<?php
include_once("Barra_Paciente.php");
// retomando a sessão criada:
session_start();
if ($_SESSION["paciente"] != "pacientelogado") {
  header('Location: index.php');
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
      <th>Data da Consulta</th>
      <th>Horário</th>
      <th>Psicologo</th>
    </tr>
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {
      echo '<tr><td>' . $agenda['data'] . '</td>';
      echo '<td>' . $agenda['horario'] . '</td>';

      $sql = "SELECT nome_psicologo FROM psicologo WHERE id_psicologo = " . $agenda['fk_psicologo'] . "";
      $buscaNome = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
      $nome = mysqli_fetch_array($buscaNome);

      echo '<td>' . $nome['nome_psicologo'] . '</td></tr>';
    }
    ?>
  </table>
</div>
</div>