
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<?php
// carrega a barra do Funcionario
include_once("Barra_Funcionario.php");
// retomando a sessão criada
session_start();
// checa se o usuário logado é um Funcionario, caso contrário, derireciona para o logout
if ($_SESSION["funcionario"] != "funcionariologado") {
  header('Location: logout.php');
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sql = "SELECT * FROM funcionario WHERE id_funcionario = " . $_SESSION['id'] . "";
$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");
?>

<div class="login-page"></div>
<div class="form">
  <p>Alterar Dados</p>
  <form method="POST" action="Altera_Perfil_Funcionario.php">
    <?php
    while ($perfil = mysqli_fetch_array($dados)) {
      echo '<label>E-mail:</label><br><input type="email" name="email" required placeholder="' . $perfil['email_funcionario'] . '" value="' . $perfil['email_funcionario'] . '">';

      echo '<label>Senha:</label><br><input type="password" minlength="8" name="senha" required placeholder="' . $perfil['senha_funcionario'] . '" value="' . $perfil['senha_funcionario'] . '">';

      echo '<label>Telefone:</label><br><input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="' . $perfil['telefone_funcionario'] . '" value="' . $perfil['telefone_funcionario'] . '">';

      echo '<label>Endereço:</label><br><input type="text" name="endereco" required placeholder="' . $perfil['endereco_funcionario'] . '" pattern="^[^-\s][a-zA-ZÀ-ú ]*" value="' . $perfil['endereco_funcionario'] . '">';

      echo '<input hidden name="id" value="' . $_SESSION['id'] . '">';
    }
    ?>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>