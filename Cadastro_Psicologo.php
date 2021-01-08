<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Cadastro</title>
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

<div class="login-page"></div>
<div class="form">
  <p>Cadastro de Psicologo</p>
  <form method="POST">
    <input type="text" maxlength="30" required name="crp" placeholder="CRP" />
    <input type="text" maxlength="11" required name="cpf" placeholder="CPF" />
    <input type="text" maxlength="100" required name="email" placeholder="E-mail" />
    <input type="password" maxlength="30" required name="senha" placeholder="Senha" />
    <input type="text" maxlength="100" required name="nome" placeholder="Nome" />
    <input type="tel" maxlength="11" required name="telefone" placeholder="Telefone" />
    <input type="textarea" maxlength="500" required name="descricao" placeholder="Descrição Profissional" />
    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>

<?php

include 'database.php';

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['crp']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['descricao']) == false)) { //verifica se estão preenchidos

  $link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

  $P_Crp = $_POST['crp'];
  $P_Senha = $_POST['senha'];
  $P_Cpf   = $_POST['cpf'];
  $P_Nome  = $_POST['nome'];
  $P_Email = $_POST['email'];
  $P_Telefone = $_POST['telefone'];
  $P_Descricao = $_POST['descricao'];

  $sql = "INSERT INTO psicologo (`email_psicologo`, `senha_psicologo`, `cpf_psicologo`, `crp_psicologo`, `nome_psicologo`, `telefone_psicologo`, `infos_psicologo`) values ('" . $P_Email . "', '" . $P_Senha . "', '" . $P_Cpf . "', '" . $P_Crp . "', '" . $P_Nome . "', '" . $P_Telefone . "', '" . $P_Descricao . "')";

  mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

  mysqli_close($link);

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>