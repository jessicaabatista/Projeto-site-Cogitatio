<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$P_Senha = $_POST['senha'];
$P_Email = $_POST['email'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_ID = $_POST['id'];

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['telefone']) == false)) { //verifica se estão preenchidos

  $sqlUpdate = "UPDATE funcionario SET `email_funcionario` = '$P_Email', `senha_funcionario` = '$P_Senha', `telefone_funcionario` = '$P_Telefone', `endereco_funcionario` = '$P_Endereco' WHERE id_funcionario = '$P_ID'";

  mysqli_query($link, $sqlUpdate) or die("Erro ao tentar gravar as informações!");
} else {
  echo "Dados não preenchidos";
}

$sql = "SELECT * FROM funcionario WHERE id_funcionario = " . $P_ID . "";

$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

?>

<!DOCTYPE html>
<html lang="pt-BR">

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
  <form method="POST" action="Altera_Perfil_Funcionario.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>E-mail:</label><br><input name=""email value="' . $agenda['email_funcionario'] . '">';
      echo '<label>Senha:</label><br><input name="senha" value="' . $agenda['senha_funcionario'] . '">';
      echo '<label>Telefone:</label><br><input name="telefone" value="' . $agenda['telefone_funcionario'] . '">';
      echo '<label>Endereço:</label><br><input name="endereco" value="' . $agenda['endereco_funcionario'] . '">';
      echo '<input hidden name="id" value="' . $P_ID . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>