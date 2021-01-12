<?php
include_once("Barra_Inicial.php");
session_start();
session_destroy();
// arquivo de conexão com o banco de dados:
include_once("database.php");

// Recebendo os dados a inserir
$F_Email = $_POST['email'];
$F_Senha = $_POST['senha'];
$F_Cpf   = $_POST['cpf'];
$F_Nome  = $_POST['nome'];
$F_Telefone = $_POST['telefone'];
$F_Endereco = $_POST['endereco'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <table border="1" style='width:20%'>
    <tr>
    </tr>
</div>
</div>

<?php
if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false)) { //verifica se estão preenchidos

  $sql = "INSERT INTO funcionario (senha_funcionario, email_funcionario, cpf_funcionario, nome_funcionario, endereco_funcionario, telefone_funcionario) values ('$F_Senha','$F_Email', '$F_Cpf', '$F_Nome', '$F_Endereco', '$F_Telefone')";

  $resultado = mysqli_query($strcon, $sql) or die("Erro ao tentar gravar as informações! Algum dado pode já estar cadastrado ou incompleto");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>