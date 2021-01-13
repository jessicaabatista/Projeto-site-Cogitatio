<?php
include_once("Barra_Inicial.php");
$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

session_start();

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Marcar Consulta</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <p>Marcar Horário</p>
  <form method="POST" action="Marcar_Consulta_Paciente_Post.php">

    <label>Data da Consulta:</label>
    <input name="data" required type="date" value="0000-00-00" />

    <label>Horário da Consulta:</label><br>
    <select name="horario" require>
      <option value="09">09:00</option>
      <option value="10">10:00</option>
      <option value="11">11:00</option>
      <option value="12">12:00</option>
      <option value="14">14:00</option>
      <option value="15">15:00</option>
      <option value="16">16:00</option>
      <option value="17">17:00</option>
      <option value="18">18:00</option>
      <option value="19">19:00</option>
      <option value="20">20:00</option>
    </select><br><br>

    <?php
    echo '<input hidden name="id" value="' . $_SESSION['id'] . '">';
    ?>

    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>