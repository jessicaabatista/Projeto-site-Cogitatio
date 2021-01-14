<?php
// carrega a barra do paciente
include_once("Barra_Paciente.php");
// retomando a sessão criada
session_start();
// checa se o usuário logado é um paciente, caso contrário, derireciona para o logout
if ($_SESSION["paciente"] != "pacientelogado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM paciente WHERE id_paciente = " . $_SESSION['id'] . "";
$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
mysqli_close($link);
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <p>Alterar Dados</p>
  <form method="POST" action="Altera_Perfil_Paciente.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>Endereço:</label><br><input type="text" name="endereco" required pattern="^[^-\s][a-zA-ZÀ-ú ]*"' . $perfil['endereco_paciente'] . '" placeholder="' . $perfil['endereco_paciente'] . '">';

      echo '<label>E-mail:</label><br><input type="email" name="email" required"' . $perfil['email_paciente'] . '" placeholder="' . $perfil['email_paciente'] . '">';

      echo '<label>Telefone:</label><br><input type="tel" name="telefone" minlength="11" maxlength="11" required "' . $perfil['telefone_paciente'] . '" placeholder="' . $perfil['telefone_paciente'] . '">';

      echo '<label>Senha:</label><br><input type="password" minlength="8" name="senha" required "' . $perfil['senha_paciente'] . '">';

      echo '<input hidden name="id" "' . $_SESSION['id'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>