<?php


$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

session_start();

$id = $_POST['consulta'];

$sqlProcura = "SELECT * FROM consulta WHERE id_consulta = '$id'";
$result = mysqli_query($link, $sqlProcura) or die("Erro ao tentar gravar as informações!");
$consulta = mysqli_fetch_array($result);

if (empty($_POST['consulta']) == false) { //verifica se estão preenchidos

  $sql = "DELETE FROM consulta WHERE id_consulta = '$id'";
  mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

  $sqlMensagem = "INSERT INTO avisos (`mensagem`, `fk_paciente`) values ('A consulta ".$id." foi cancelada!', ". $consulta['fk_paciente'] .")";
  mysqli_query($link, $sqlMensagem) or die("Erro ao tentar gravar as informações!");

} else {
  echo "Dados não preenchidos";
}

?>