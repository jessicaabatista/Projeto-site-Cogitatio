<?php
// carrega a barra do psicologo
include_once("Barra_psicologo.php");
// retomando a sessão criada
session_start();
// checa se o usuário logado é um psicologo, caso contrário, derireciona para o logout
if ($_SESSION["psicologo"] != "psicologologado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$P_Senha = $_POST['senha'];
$P_Email = $_POST['email'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_ID = $_POST['id'];

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['telefone']) == false)) { //verifica se estão preenchidos

  $sqlUpdate = "UPDATE psicologo SET `email_psicologo` = '$P_Email', `senha_psicologo` = '$P_Senha', `telefone_psicologo` = '$P_Telefone', `endereco_psicologo` = '$P_Endereco' WHERE id_psicologo = '$P_ID'";

  mysqli_query($link, $sqlUpdate) or die("Erro ao tentar gravar as informações!");
} else {
  echo "Dados não preenchidos";
}

$sql = "SELECT * FROM psicologo WHERE id_psicologo = " . $P_ID . "";

$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

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
  <form method="POST" action="Altera_Perfil_psicologo.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>E-mail:</label><br><input type="email" name="email" required placeholder="' . $perfil['email_psicologo'] . '" value="' . $perfil['email_psicologo'] . '">';

      echo '<label>Senha:</label><br><input type="password" minlength="8" name="senha" required placeholder="' . $perfil['senha_psicologo'] . '" value="' . $perfil['senha_psicologo'] . '">';

      echo '<label>Telefone:</label><br><input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="' . $perfil['telefone_psicologo'] . '" value="' . $perfil['telefone_psicologo'] . '">';

      echo '<label>Endereço:</label><br><input type="text" name="endereco" required placeholder="' . $perfil['endereco_psicologo'] . '" pattern="^[^-\s][a-zA-ZÀ-ú ]*" value="' . $perfil['endereco_psicologo'] . '">';

      echo '<input hidden name="id" value="' . $P_ID . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>