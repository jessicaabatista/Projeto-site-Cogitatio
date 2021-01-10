<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>COGITATION</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="index.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>

</html>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
</div>
<script>
    $(function() {
        $("#nav-placeholder").load("Barra_Inicial.php");
    });
</script>

<div class="text-center">
    <br><br><br><br><br><br><br><br><br>
    <h1>COGITATION</h1>
    <div>
        <h3>Marque suas consultas</h3>
        <br>
        <a href="Login_Paciente.html">
            <button type="button" class="btn btn-outline-light btn-lg"> Login </button>
        </a>
        <a href="Cadastro_Paciente.php">
            <button type="button" class="btn btn-primary btn-lg">Cadastro</button>
        </a>
    </div>
</div>