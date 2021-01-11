<?php
// retomando a sessão criada:
session_start();
if ($_SESSION["psicologo"] != "psicologologado") {
  header('Location: index.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM consulta WHERE fk_psicologo = " . $_SESSION['id'] . "";
$consultas = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Agenda</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Psicologo.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form2">
  <p>Agenda</p>
  <table border="1" align="center">
    <tr>
      <th>Data da Consulta</th>
      <th>Horário</th>
      <th>Paciente</th>
    </tr>
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {
      echo '<tr><td>' . $agenda['data'] . '</td>';
      echo '<td>' . $agenda['horario'] . '</td>';

      $sql = "SELECT nome_paciente FROM paciente WHERE id_paciente = " . $agenda['fk_paciente'] . "";
      $buscaNome = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
      $nome = mysqli_fetch_array($buscaNome);

      echo '<td>' . $nome['nome_paciente'] . '</td></tr>';
    }
    ?>
  </table>
</div>
</div>