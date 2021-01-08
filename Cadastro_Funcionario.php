<?php
   // arquivo de conexão com o banco de dados:
   include_once("database.php");
   
   // Recebendo os dados a inserir
  $F_Email = $_POST['email'];
  $F_Senha = $_POST['senha'];
  $F_Cpf   = $_POST['cpf'];
  $F_Nome  = $_POST['nome'];
  $F_Telefone = $_POST['telefone'];
  $F_Endereco = $_POST['endereco'];
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>


<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Inicial.php");
    });
  </script>
</div>

<div class="login-page"></div>
  <div class="form">
  <table border="1" style='width:20%'>
    <tr>
    </tr>
  </div>
</div>

<?php


if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false)) { //verifica se estão preenchidos

  $sql = "INSERT INTO funcionario (id_funcionario, senha_funcionario, email_funcionario, cpf_funcionario, nome_funcionario, endereco_funcionario, telefone_funcionario, fk_psicologo) values (@@IDENTITY, '$F_Senha','$F_Email', '$F_Cpf', '$F_Nome', '$F_Endereco', '$F_Telefone', @@IDENTITY)";

  $resultado = mysqli_query($strcon,$sql)or die("Erro ao tentar gravar as informações!");

  echo "Cadastrado feito com sucesso";
} else {
  echo "Dados não preenchidos";
}

?>