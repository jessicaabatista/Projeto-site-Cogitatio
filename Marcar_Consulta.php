<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sqlPsicologo = "SELECT nome_psicologo, id FROM psicologo";

$selectPsicologo = mysqli_query($link, $sqlPsicologo) or die("Erro ao tentar buscar as informações!");

$sqlPaciente = "SELECT nome_paciente, id FROM paciente";

$selectPaciente = mysqli_query($link, $sqlPaciente) or die("Erro ao tentar buscar as informações!");

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Marcar Consulta</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
</div>
<script>
  $(function() {
    $("#nav-placeholder").load("Barra_Paciente.php");
  });
</script>

<div class="login-page"></div>
<div class="form">
  <p>Marcar Horário</p>
  <form method="POST">
    <input id="data" required type="date" value="0000-00-00" placeholder="Data da Consulta" />
    <input id="hora" required type="time" placeholder="Horário da Consulta" />

    <select>
      <?php
      while ($listaPsicologo = mysqli_fetch_array($selectPsicologo)) {
        echo '<option name="psicologo" value="' . $listaPsicologo['id'] . '"> ' . $listaPsicologo['nome_psicologo'] . ' <option/>';
      }
      ?>
    </select>
    <?php
    if (isset($_SESSION['id_paciente'])) {
    ?>
      <select>
      <?php
      while ($listaPaciente = mysqli_fetch_array($selectPaciente)) {
        echo '<option name="paciente" value="' . $listaPaciente['id'] . '"> ' . $listaPaciente['nome_paciente'] . ' <option/>';
      }
    }
      ?>
      </select>
      <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>

<?php

require('database.php');

if ((empty($_POST['psicologo']) == false) and (empty($_POST['data']) == false) and (empty($_POST['horario']) == false) and (empty($_POST['paciente']) == false)) { //verifica se estão preenchidos

  $psicologo = $_POST['psicologo'];
  $data = $_POST['data'];
  $horario   = $_POST['horario'];
  $paciente  = $_POST['paciente'];

  $sql = "INSERT INTO consulta (`data`, `horario`, `fk_psicologo`, `fk_paciente`) values ('$data', '$horario', '$psicologo', '$paciente)";

  $resultado = mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>