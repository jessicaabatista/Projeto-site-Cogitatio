<?php
// arquivo de conexão com o banco de dados:
include_once("database.php");
$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Login Paciente</title>
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


<div class="login-page">
  <div class="form">
    <p>Login Paciente</p>

  </div>
</div>

<?php
if (isset($_POST['logar'])) {

  session_start();

  $P_Email = mysqli_real_escape_string($strcon, $_POST['email']);
  $P_Senha = mysqli_real_escape_string($strcon, $_POST['senha']);

  if ($P_Email != "" && $P_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM paciente WHERE email_paciente = '$P_Email' and senha_paciente = '$P_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
      $_SESSION["paciente"] = "pacientelogin";
      header('Location: inicial_paciente.php');
    } else {
      echo "Usuario invalido";
    }
  }
}
?>