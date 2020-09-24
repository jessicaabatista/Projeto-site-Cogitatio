<?php
	include_once('conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
	
	$result_msg_contato = "INSERT INTO teste(email_teste, senha_teste) VALUES ('$email', '$senha', NOW())";
	$resultado_msg_contato= mysqli_query($conn, $result_msg_contato)
?>