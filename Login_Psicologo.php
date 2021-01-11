<?php
// arquivo de conexão com o banco de dados:
include_once("database.php");
$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Login Psicologo</title>
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
if (isset($_POST['Login'])) {
  session_start();

  $sql_query = "SELECT count(*) AS cntUser FROM psicologo WHERE email_psicologo = '$P_Email' and senha_psicologo = '$P_Senha'";
  $result = mysqli_query($strcon, $sql_query);
  $row = mysqli_fetch_array($result);
  $count = $row['cntUser'];

  if ($count > 0) {
    $_SESSION["psicologo"] = "psicologologado";

    $sql_query = "SELECT * FROM psicologo WHERE email_psicologo = '$P_Email' and senha_psicologo = '$P_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $dados = mysqli_fetch_array($result);

    $_SESSION['id'] = $dados['id_psicologo'];

    header('Location: inicial_psicologo.php');
  }
}
?>