<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sql = "SELECT * FROM paciente WHERE id_paciente = " . $_SESSION['id_paciente'] . "";

$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Paciente.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form">
  <p>Alterar Dados</p>
  <form method="POST">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<input value="' . $agenda['nome_paciente'] . '">';
      echo '<input value="' . $agenda['email_paciente'] . '">';
      echo '<input value="' . $agenda['cpf_paciente'] . '">';
      echo '<input value="' . $agenda['crp_paciente'] . '">';
      echo '<input value="' . $agenda['telefone_paciente'] . '">';
      echo '<input value="' . $agenda['infos_paciente'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>