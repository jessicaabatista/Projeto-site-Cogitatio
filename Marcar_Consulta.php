<?php
session_start();
if ($_SESSION["geral"] != "psicologologado" && $_SESSION["geral"] != "funcionariologado") {
  header('Location: logout.php');
}

if ($_SESSION["geral"] == "psicologologado") {
  include_once("Barra_Psicologo.php");
}elseif($_SESSION["geral"] == "funcionariologado"){
  include_once("Barra_Funcionario.php");
}

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sqlPaciente = "SELECT nome_paciente, id_paciente FROM paciente";
$selectPaciente = mysqli_query($link, $sqlPaciente) or die("Erro ao tentar buscar as informações!");

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
  <form method="POST" action="Marcar_Consulta_Post.php">
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
    </select>
    <br><br>
    <label>Paciente:</label>
    <select name="paciente">
      <?php
      while ($listaPaciente = mysqli_fetch_array($selectPaciente)) {
        echo '<option value="' . $listaPaciente['id_paciente'] . '"> ' . $listaPaciente['nome_paciente'] . ' </option>';
      }
      ?>
    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>