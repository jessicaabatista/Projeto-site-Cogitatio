<?php
// arquivo de conexão com o banco de dados:
include_once("database.php");

$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
$P_Cpf   = $_POST['cpf'];
$P_Nome  = $_POST['nome'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_Data = $_POST['data'];
$P_Psicologo = $_POST['psicologo'];

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>


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
  <table border="1" style='width:20%'>
    <tr>
    </tr>
</div>
</div>


<?php

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['data']) == false) and (empty($_POST['psicologo']) == false)) { //verifica se estão preenchidos
 
  $sql = "INSERT INTO paciente (email_paciente, senha_paciente, cpf_paciente, nome_paciente, telefone_paciente, endereco_paciente, data_nasc_paciente, fk_psicologo) values ('$P_Email', '$P_Senha', '$P_Cpf', '$P_Nome', '$P_Telefone', '$P_Endereco', '$P_Data', '$P_Psicologo')";

  mysqli_query($strcon, $sql) or die ("Erro ao tentar gravar as informações!");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>