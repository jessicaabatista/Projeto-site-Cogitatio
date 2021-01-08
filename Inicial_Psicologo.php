<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sql = "SELECT * FROM consulta c
  INNER JOIN paciente p ON c.fk_paciente = p.id_paciente
  WHERE c.fk_psicologo = 1";

$consultas = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Agenda</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Funcionario.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form2">
  <p>Agenda</p>
  <form method="POST">
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {
      echo '<input value="' . $agenda['data'] . '">';
      echo '<input value="' . $agenda['horario'] . '">';
      echo '<input value="' . $agenda['nome_paciente'] . '">';
    }
    ?>
  </form>
</div>
</div>