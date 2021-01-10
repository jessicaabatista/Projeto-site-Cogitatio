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
  <title>Login Psicologo</title>
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
    <p>Login Psicologo</p>

    </form>
  </div>
</div>

<?php
if (isset($_POST['logar'])) {

  $P_Email = mysqli_real_escape_string($strcon, $_POST['email']);
  $P_Senha = mysqli_real_escape_string($strcon, $_POST['senha']);

  if ($P_Email != "" && $P_Senha != "") {
    $sql_query = "SELECT count(*) AS cntUser FROM psicologo WHERE email_psicologo = '$P_Email' and senha_psicologo = '$P_Senha'";
    $result = mysqli_query($strcon, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
      $P_Sessao = "SELECT id_psicologo FROM psicologo WHERE email_psicologo = '$P_Email' and senha_psicologo = '$P_Senha'";
      $_SESSION['psicologo'] = $P_Sessao;
      header('Location: inicial_psicologo.php');
    } else {
      echo "Usuario invalido";
    }
  }
}
