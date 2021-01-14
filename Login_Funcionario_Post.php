<?php
include_once("Barra_Inicial.php");
// inicia e destroi a sessão 
session_start();
session_destroy();
// arquivo de conexão com o banco de dados:
include_once("database.php");

$F_Cpf = $_POST['cpf'];
$F_Senha = $_POST['senha'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Login Funcinario</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page">
  <div class="form">
  <p>Login ou senha incorretos</p>
    <a onClick="history.go(-1)">
            <button type="button" class="btn btn-primary btn-lg">Tentar Novamente</button>
        </a>
  </div>
</div>

<?php
if (isset($_POST['Login'])) {
  session_start();

  $sql_query = "SELECT count(*) AS cntUser FROM funcionario WHERE cpf_funcionario = '$F_Cpf' and senha_funcionario = '$F_Senha'";
  $result = mysqli_query($strcon, $sql_query);
  $row = mysqli_fetch_array($result);
  $count = $row['cntUser'];

  if ($count > 0) {
    $_SESSION["funcionario"] = "funcionariologado";
    $_SESSION["geral"] = "funcionariologado";

    $sql_query = "SELECT * FROM funcionario WHERE cpf_funcionario = '$F_Cpf' and senha_funcionario = '$F_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $dados = mysqli_fetch_array($result);

    $_SESSION['id'] = $dados['id_funcionario'];

    header('Location: inicial_funcionario.php');
  }
}
?>