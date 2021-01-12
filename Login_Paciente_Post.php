<?php
include_once("Barra_Inicial.php");
// inicia e destroi a sessão 
session_start();
session_destroy();
// arquivo de conexão com o banco de dados:
include_once("database.php");

$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Login Paciente</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page">
  <div class="form">
    <p>Login ou senha incorretos</p>
    <input type="button" value="Voltar" class="btn btn-primary btn-lg" onClick="history.go(-1)">
  </div>
</div>

<?php
if (isset($_POST['Login'])) {
  session_start();

  if ($P_Email != "" && $P_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM paciente WHERE email_paciente = '$P_Email' and senha_paciente = '$P_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
      $_SESSION["paciente"] = "pacientelogado";

      $sql_query = "SELECT * FROM paciente WHERE email_paciente = '$P_Email' and senha_paciente = '$P_Senha'";
      $result = mysqli_query($strcon, $sql_query);
      $dados = mysqli_fetch_array($result);

      $_SESSION["id"] = $dados['id_paciente'];

      header('Location: inicial_paciente.php');
    } else {
      echo "Usuario invalido";
    }
  }
}
?>