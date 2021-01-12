<?php
session_start();
if ($_SESSION["psicologo"] != "psicologologado") {
  header('Location: logout.php');
}
include_once("Barra_Psicologo.php");
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <p>Alterar Dados</p>
  <form method="POST">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<input value="' . $agenda['nome_psicologo'] . '">';
      echo '<input value="' . $agenda['email_psicologo'] . '">';
      echo '<input value="' . $agenda['cpf_psicologo'] . '">';
      echo '<input value="' . $agenda['crp_psicologo'] . '">';
      echo '<input value="' . $agenda['telefone_psicologo'] . '">';
      echo '<input value="' . $agenda['infos_psicologo'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>