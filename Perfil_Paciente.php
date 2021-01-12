<?php
session_start();
if ($_SESSION["paciente"] != "pacientelogado") {
  header('Location: logout.php');
}
include_once("Barra_Paciente.php");

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM paciente WHERE id_paciente = " . $_SESSION['id'] . "";
$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
mysqli_close($link);

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
  <form method="POST" action="Altera_Perfil.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<input value="' . $perfil['endereco_paciente'] . '" placeholder="' . $perfil['endereco_paciente'] . '">';
      echo '<input value="' . $perfil['email_paciente'] . '" placeholder="' . $perfil['email_paciente'] . '">';
      echo '<input value="' . $perfil['telefone_paciente'] . '" placeholder="' . $perfil['telefone_paciente'] . '">';
      echo '<input value="' . $perfil['senha_paciente'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>