<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sqlPsicologo = "SELECT nome_psicologo, id_psicologo FROM psicologo";

$selectPsicologo = mysqli_query($link, $sqlPsicologo) or die("Erro ao tentar buscar as informações!");

$sqlPaciente = "SELECT nome_paciente, id_paciente FROM paciente";

$selectPaciente = mysqli_query($link, $sqlPaciente) or die("Erro ao tentar buscar as informações!");

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Marcar Consulta</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
</div>
<script>
  $(function() {
    $("#nav-placeholder").load("Barra_Paciente.php");
  });
</script>

<div class="login-page"></div>
<div class="form">
  <p>Marcar Horário</p>
  <form method="POST" action="Envia_Consulta.php">
    <label>Data da Consulta</label>
    <input name="data" required type="date" value="0000-00-00" />
    <label>Horário da Consulta</label>
    <input name="horario" required type="time" />

    <select name="psicologo">
      <?php
      while ($listaPsicologo = mysqli_fetch_array($selectPsicologo)) {
        echo '<option value="' . $listaPsicologo['id_psicologo'] . '"> ' . $listaPsicologo['nome_psicologo'] . ' <option/>';
      }
      ?>
    </select>
    <?php
    if (!isset($_SESSION['id_paciente'])) {
    ?>
      <select name="paciente">
      <?php
      while ($listaPaciente = mysqli_fetch_array($selectPaciente)) {
        echo '<option value="' . $listaPaciente['id_paciente'] . '"> ' . $listaPaciente['nome_paciente'] . ' <option/>';
      }
    }
      ?>
      </select>
      <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>