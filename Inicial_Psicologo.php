<?php
// retomando a sessão criada:
session_start();
 if ($_SESSION["psicologo"] != "psicologologado"){
  header('Location: index.php');
 }
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Agenda</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Psicologo.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form2">
  <p>Agenda</p>
  <table>
    <td>Data</td>
    <td>Horário</td>
    <td>Paciente</td>
   
  </table>
</div>
</div>