<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Alterar Dados</title>
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
  <form method="POST">
    <input type="text" required placeholder="E-mail" />
    <input type="password" required placeholder="Senha" />
    <input type="password" required placeholder="Confirmar senha" />
    <input type="text" required placeholder="CPF" />
    <input type="text" required placeholder="Nome" />
    <input type="tel" required placeholder="Telefone" />
    <input type="text" required placeholder="Endereço" />
    <input id="date" required type="date" value="0000-00-00" placeholder="Data do Nascimento" />
    </select><br><br>
    <input type="submit" value="Alterar" id="Alterar" name="Alterar">
  </form>
</div>
</div>