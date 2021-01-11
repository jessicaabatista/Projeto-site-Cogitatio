<?php
// retomando a sessão criada:
session_start();

if ($_SESSION["psicologo"] = "psicologologin"){
  header('Location: index.php');
 }
 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Minhas Consultas</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Funcionario.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form2">
  <p>Consultas</p>
  <table>
    <td>Data</td>
    <td>Horário</td>
    <td>Paciente</td>
    <td>Psicologo</td>
    <?php
    while ($agenda = mysqli_fetch_array($consultas)) {
      echo '<tr>' . $agenda['data'] . '</tr>';
      echo '<tr>' . $agenda['horario'] . '</tr>';
      echo '<tr>' . $agenda['nome_psicologo'] . '</tr>';
    }
    ?>
  </table>
</div>
</div>