<?php
// carrega a barra do paciente
include_once("Barra_paciente.php");
// retomando a sessão criada
session_start();
// checa se o usuário logado é um paciente, caso contrário, derireciona para o logout
if ($_SESSION["paciente"] != "pacientelogado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$P_Senha = $_POST['senha'];
$P_Email = $_POST['email'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_ID = $_POST['id'];

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['telefone']) == false)) { //verifica se estão preenchidos

  $sqlUpdate = "UPDATE paciente SET `email_paciente` = '$P_Email', `senha_paciente` = '$P_Senha', `telefone_paciente` = '$P_Telefone', `endereco_paciente` = '$P_Endereco' WHERE id_paciente = '$P_ID'";

  mysqli_query($link, $sqlUpdate) or die("Erro ao tentar gravar as informações!");
} else {
  echo "Dados não preenchidos";
}

$sql = "SELECT * FROM paciente WHERE id_paciente = " . $P_ID . "";

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
  <form method="POST" action="Altera_Perfil_paciente.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>E-mail:</label><br><input type="email" name="email" required placeholder="' . $perfil['email_paciente'] . '" value="' . $perfil['email_paciente'] . '">';

      echo '<label>Senha:</label><br><input type="password" minlength="8" name="senha" required placeholder="' . $perfil['senha_paciente'] . '" value="' . $perfil['senha_paciente'] . '">';

      echo '<label>Telefone:</label><br><input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="' . $perfil['telefone_paciente'] . '" value="' . $perfil['telefone_paciente'] . '">';

      echo '<label>Endereço:</label><br><input type="text" name="endereco" required placeholder="' . $perfil['endereco_paciente'] . '" pattern="^[^-\s][a-zA-ZÀ-ú ]*" value="' . $perfil['endereco_paciente'] . '">';

      echo '<input hidden name="id" value="' . $P_ID . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>