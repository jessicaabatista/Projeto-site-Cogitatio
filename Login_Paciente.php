<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Login Paciente</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Inicial.php");
    });
  </script>
</div>


<div class="login-page">
  <div class="form">
    <p>Login Paciente</p>
    <form method="post">
      <input type="text" id="email" name="email" placeholder="E-mail" />
      <input type="password" id="senha" name="senha" placeholder="Senha" />
      <input type="submit" value="logar" id="logar" name="logar">
      <p class="message">Não tem cadastro? <a href="Cadastro_Paciente.php">Crie uma conta</a></p>
    </form>
  </div>
</div>

<?php

if (isset($_POST['logar'])) {
  session_start();

  $link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

  $P_Email = mysqli_real_escape_string($link, $_POST['usuario']);

  $P_Senha = mysqli_real_escape_string($link, $_POST['senha']);

  if ($P_Email != "" && $P_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM paciente WHERE email_paciente = '" . $P_Email . "' and senha_paciente = '" . $P_Senha . "'";

    $result = mysqli_query($link, $sql_query);

    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if ($count > 0) {

      $sql = "SELECT id_paciente FROM paciente WHERE email_paciente = '" . $P_Email . "' and senha_paciente = '" . $P_Senha . "'";

      $id = mysqli_query($link, $sql);

      $_SESSION['usuarioLogado'] = $P_Email;
      $_SESSION['id_paciente'] = $id;

      header('Location: Inicial_Paciente.php');
    } else {
      header('Location: Login_Paciente.php');

      echo "Usuario invalido";
    }
  }
}
?>