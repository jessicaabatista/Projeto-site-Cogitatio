<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$P_Senha = $_POST['senha'];
$P_Email = $_POST['email'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['telefone']) == false)) { //verifica se estão preenchidos

    $sqlUpdate = "UPDATE paciente SET `email_psicologo` = '$P_Email', `senha_psicologo` = '$P_Senha', `telefone_psicologo` = '$P_Telefone', `endereco_psicologo` = '$P_Endereco'";

    mysqli_query($link, $sqlUpdate) or die("Erro ao tentar gravar as informações!");

    echo "Cadastrado feito com sucesso";
} else {
    echo "Dados não preenchidos";
}

$sql = "SELECT * FROM paciente WHERE id_paciente = " . $_SESSION['id_paciente'] . "";

$dados = mysqli_query($link, $sql) or die("Erro ao tentar buscar as informações!");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Alterar Dados</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="Estilo.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
    <script>
        $(function() {
            $("#nav-placeholder").load("Barra_Paciente.php");
        });
    </script>
</div>

<div class="login-page"></div>
<div class="form">
    <p>Alterar Dados</p>
    <form method="POST" action="Altera_Perfil.php">
        <?php
        while ($perfil = mysqli_fetch_array($dados)) {
            echo '<input name="endereco" value="' . $perfil['endereco_paciente'] . '" placeholder="' . $perfil['endereco_paciente'] . '">';
            echo '<input name="email" value="' . $perfil['email_paciente'] . '" placeholder="' . $perfil['email_paciente'] . '">';
            echo '<input name="telefone" value="' . $perfil['telefone_paciente'] . '" placeholder="' . $perfil['telefone_paciente'] . '">';
            echo '<input name="senha" value="' . $perfil['senha_paciente'] . '">';
        }
        ?>
        <input type="submit" value="Alterar" id="Alterar" name="Alterar">
    </form>
</div>
</div>