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
    <input id="date" required type="date" value="0000-00-00" placeholder="Data do Nascimento" />
    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>