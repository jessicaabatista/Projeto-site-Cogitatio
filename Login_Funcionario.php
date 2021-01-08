<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Login Funcinario</title>
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
    <p>Login Funcionario</p>
    <form method="post">
      <input type="text" id="usuario" name="usuario" placeholder="Username" />
      <input type="password" id="senha" name="senha" placeholder="Password" />
      <input type="submit" value="logar" id="logar" name="logar">
    </form>
  </div>
</div>



<?php
session_start();

if (isset($_POST['logar'])) {

  $link = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");

  $F_Email = mysqli_real_escape_string($link, $_POST['usuario']);

  $F_Senha = mysqli_real_escape_string($link, $_POST['senha']);

  if ($F_Email != "" && $F_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM paciente WHERE email_paciente = '" . $F_Email . "' and senha_paciente = '" . $F_Senha . "'";

    $result = mysqli_query($link, $sql_query);

    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if ($count > 0) {

      $sql = "SELECT id_funcionario FROM funcionario WHERE email_funcionario = '" . $F_Email . "' and senha_funcionario = '" . $F_Senha . "'";

      $id = mysqli_query($link, $sql);

      $_SESSION['usuarioLogado'] = $P_Email;
      $_SESSION['id_funcionario'] = $id;

      header('Location: Inicial_Funcionario.php');
    } else {
      header('Location: Login_Funcionario.php');

      echo "Usuario invalido";
    }
  }
}
?>