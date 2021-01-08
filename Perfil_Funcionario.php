<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sql = "SELECT * FROM funcionario WHERE id_funcionario = " . $_SESSION['id_funcionario'] . "";

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
      $("#nav-placeholder").load("Barra_Funcionario.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form">
  <p>Alterar Dados</p>
  <form method="POST">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<input value="' . $agenda['nome_funcionario'] . '">';
      echo '<input value="' . $agenda['email_funcionario'] . '">';
      echo '<input value="' . $agenda['cpf_funcionario'] . '">';
      echo '<input value="' . $agenda['crp_funcionario'] . '">';
      echo '<input value="' . $agenda['telefone_funcionario'] . '">';
      echo '<input value="' . $agenda['infos_funcionario'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>