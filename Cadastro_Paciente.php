<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sqlPsicologo = "SELECT nome_psicologo, id_psicologo FROM psicologo";

$selectPsicologo = mysqli_query($link, $sqlPsicologo) or die ("Erro ao tentar gravar as informações!");

?>

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
  <p>Cadastro Cliente</p>
  <form method="POST" action="Cadastro_Paciente.php">
    <input type="text" required placeholder="E-mail" />
    <input type="password" required placeholder="Senha" />
    <input type="password" required placeholder="Confirmar senha" />
    <input type="text" required placeholder="CPF" />
    <input type="text" required placeholder="Nome" />
    <input type="tel" required placeholder="Telefone" />
    <input type="text" required placeholder="Endereço" />
    <input id="date" required type="date" value="0000-00-00" placeholder="Data do Nascimento" />
    <select>
      <?php
      while ($listaPsicologo = mysqli_fetch_array($selectPsicologo)) {
        echo '<option name="psicologo" value="' . $listaPsicologo['id_psicologo'] . '"> ' . $listaPsicologo['nome_psicologo'] . ' <option/>';
      }
      ?>
    </select>
    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
    <p class="message">Já cadastrado? <a href="Login_Paciente.php">Faça login</a></p>
  </form>
</div>
</div>


<?php

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['data']) == false) and (empty($_POST['psicologo']) == false)) { //verifica se estão preenchidos

  require('database.php');

  $P_Email = $_POST['email'];
  $P_Senha = $_POST['senha'];
  $P_Cpf   = $_POST['cpf'];
  $P_Nome  = $_POST['nome'];
  $P_Telefone = $_POST['telefone'];
  $P_Endereco = $_POST['endereco'];
  $P_Data = $_POST['data'];
  $P_Psicologo = $_POST['psicologo'];

  $sql = "INSERT INTO paciente (`email_paciente`, `senha_paciente`, `cpf_paciente`, `nome_paciente`, `telefone_paciente`, `endereco_paciente`, `data_nasc_paciente`, `fk_psicologo`) values (' $P_Email ', ' $P_Senha ', ' $P_Cpf ', '$P_Nome ', ' $P_Telefone ', ' $P_Endereco ', ' $P_Data ', '$P_Psicologo')";

  $resultado = mysqli_query($link, $sql) or die ("Erro ao tentar gravar as informações!");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>