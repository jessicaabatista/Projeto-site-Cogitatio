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
  <p>Cadastro de Funcionarios</p>
  <form method="POST">
    <input type="text" required placeholder="E-mail" />
    <input type="password" required placeholder="Senha" />
    <input type="password" required placeholder="Confirmar senha" />
    <input type="text" required placeholder="CPF" />
    <input type="text" required placeholder="Nome" />
    <input type="tel" required placeholder="Telefone" />
    <input type="text" required placeholder="Endereço" />
    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>

<?php

include 'database.php';

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false)) { //verifica se estão preenchidos

  $link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

  $F_Email = $_POST['email'];
  $F_Senha = $_POST['senha'];
  $F_Cpf   = $_POST['cpf'];
  $F_Nome  = $_POST['nome'];
  $F_Telefone = $_POST['telefone'];
  $F_Endereco = $_POST['endereco'];

  $sql = "INSERT INTO funcionario (`email_funcionario`, `senha_funcionario`, `cpf_funcionario`, `nome_funcionario`, `telefone_funcionario`, `endereco_funcionario`, `fk_psicologo`) values ('" . $F_Email . "', '" . $F_Senha . "', '" . $F_Cpf . "', '" . $F_Nome . "', '" . $F_Telefone . "', '" . $F_Endereco . "', 1)";

  $resultado = mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>