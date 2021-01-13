<?php
session_start();
if ($_SESSION["psicologo"] != "psicologologado") {
  header('Location: logout.php');
}
include_once("Barra_Psicologo.php");

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM psicologo WHERE id_psicologo = " . $_SESSION['id'] . "";
$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

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
  <form method="POST" action="Altera_Perfil_Psicologo.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>E-mail:</label><br><input required name="email" value="' . $agenda['email_psicologo'] . '">';

      echo '<label>Senha:</label><br><input type="password" minlength="8" name="senha" required value="' . $agenda['senha_psicologo'] . '" placeholder="' . $agenda['senha_psicologo'] . '">';

      echo '<label>Telefone</label><br><input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="' . $agenda['telefone_psicologo'] . '" value="' . $agenda['telefone_psicologo'] . '">';

      echo '<label>Descrição Profissional:</label><br><input type="textarea" maxlength="500" required name="descricao" placeholder="' . $agenda['infos_psicologo'] . '" value="' . $agenda['infos_psicologo'] . '">';
      
      echo '<input hidden name="id" value="' . $_SESSION['id'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>