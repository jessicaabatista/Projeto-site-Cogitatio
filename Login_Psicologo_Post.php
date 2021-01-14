<?php
include_once("Barra_Inicial.php");
// inicia e destroi a sessão 
session_start();
session_destroy();
// arquivo de conexão com o banco de dados:
include_once("database.php");

$P_Cpf = $_POST['cpf'];
$P_Senha = $_POST['senha'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Login Psicologo</title>
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

  if ($P_Cpf != "" && $P_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM psicologo WHERE cpf_psicologo = '$P_Cpf' and senha_psicologo = '$P_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
      $_SESSION["psicologo"] = "psicologologado";
      $_SESSION["geral"] = "psicologologado";
      $sql_query = "SELECT * FROM psicologo WHERE cpf_psicologo = '$P_Cpf' and senha_psicologo = '$P_Senha'";
      $result = mysqli_query($strcon, $sql_query);
      $dados = mysqli_fetch_array($result);

      $_SESSION['id'] = $dados['id_psicologo'];

      header('Location: inicial_psicologo.php');
    } else {
    }
  }
}
?>