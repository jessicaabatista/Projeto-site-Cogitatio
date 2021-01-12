<?php
include_once("Barra_Inicial.php");
session_start();
session_destroy();

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');
$sqlPsicologo = "SELECT nome_psicologo, id_psicologo FROM psicologo";
$selectPsicologo = mysqli_query($link, $sqlPsicologo) or die("Erro ao tentar gravar as informações!");
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Cadastro Cliente</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">t>
</head>

<div class="login-page"></div>
<div class="form">
  <p>Cadastro Cliente</p>
  <form method="POST" action="Cadastro_Paciente_post.php">

    <label>E-mail:</label><br>
    <input type="email" name="email" required placeholder="E-mail" />

    <label>Senha:</label><br>
    <input type="password" minlength="8" name="senha" required placeholder="Senha" />
    <input type="password" minlength="8" required placeholder="Confirmar senha" />

    <label>CPF:</label><br>
    <input type="text" name="cpf" minlength="11" maxlength="11" required placeholder="CPF" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">

    <label>ome Completo:</label><br>
    <input type="text" name="nome" required placeholder="Nome" minlength="12" maxlength="100" pattern="^[^-\s][a-zA-ZÀ-ú ]*" />

    <label>Telefone:</label><br>
    <input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="Telefone" required placeholder="CPF" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">

    <label>Endereço:</label><br>
    <input type="text" name="endereco" required placeholder="Endereço" pattern="^[^-\s][a-zA-ZÀ-ú ]*" />

    <label>Data de Nascimento:</label><br>
    <input id="date" name="data" required type="date" value="0000-00-00" />

    <label>Psicologo Escolhido:</label><br>
    <select name="psicologo" require>
      <?php
      while ($listaPsicologo = mysqli_fetch_array($selectPsicologo)) {
        echo '<option value="' . $listaPsicologo['id_psicologo'] . '"> ' . $listaPsicologo['nome_psicologo'] . ' </option>';
      }
      ?>
    </select><br>

    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
    <p class="message">Já cadastrado? <a href="Login_Paciente.php">Faça login</a></p>
  </form>
</div>
</div>