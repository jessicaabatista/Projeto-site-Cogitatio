<?php
// arquivo de conexão com o banco de dados:
include_once("database.php");
$F_Email = $_POST['email'];
$F_Senha = $_POST['senha'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Login Funcinario</title>
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

<div class="login-page">
  <div class="form">
    <p>Login ou senha incorretos</p>
    <input type="button" value="Voltar" onClick="history.go(-1)"> 
    </form>
  </div>
</div>

<?php
if (isset($_POST['logar'])) {
  session_start();

    $sql_query = "SELECT count(*) AS cntUser FROM funcionario WHERE email_funcionario = '$F_Email' and senha_funcionario = '$F_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
      $_SESSION["funcionario"] = "funcionariologado";
      header('Location: inicial_funcionario.php');
    } 
}
?>
