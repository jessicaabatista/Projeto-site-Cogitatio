<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>


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

$id = $_POST['consulta'];

$sqlProcura = "SELECT * FROM consulta WHERE id_consulta = '$id'";
$result = mysqli_query($link, $sqlProcura) or die("Erro ao tentar gravar as informações!");
$consulta = mysqli_fetch_array($result);

if (empty($_POST['consulta']) == false and $consulta != "" ) { //verifica se estão preenchidos

  $sql = "DELETE FROM consulta WHERE id_consulta = '$id'";
  mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

  $sqlMensagem = "INSERT INTO avisos (`mensagem`, `fk_paciente`) values ('A consulta ". $id ." foi cancelada!', ". $consulta['fk_paciente'] .")";
  mysqli_query($link, $sqlMensagem) or die("Erro ao tentar gravar as informações!");
?>

  <div class="login-page"></div>
  <div class="form">
    <p>Consulta cancelada com sucesso!</p>
    <a onClick="history.go(-1)">
            <button type="button" class="btn btn-primary btn-lg">Voltar</button>
        </a>
  </div>
  </div>

<?php
}else{
  ?>
  <br><br><br><br>
  <div class="form">
  <h5>Consulta não existe</h5><br>
      <a onClick="history.go(-1)">
            <button type="button" class="btn btn-primary btn-lg">Voltar</button>
        </a>
        <div>
  <?php 
  }
  ?>
