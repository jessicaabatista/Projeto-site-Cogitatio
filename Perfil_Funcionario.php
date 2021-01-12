<?php
include_once("Barra_Funcionario.php");
// retomando a sessão criada:
session_start();

if ($_SESSION["funcionario"] != "funcionariologado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM funcionario WHERE id_funcionario = " . $_SESSION['id'] . "";
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