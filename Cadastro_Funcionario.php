<?php
// arquivo de conexão com o banco de dados:
//include_once("conectar.php");

// Recebendo os dados a inserir
$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
$P_Cpf   = $_POST['cpf'];
$P_Nome  = $_POST['nome'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_Data = $_POST['data'];
?>

<!-- Barra de Navegação -->
<div id="nav-placeholder">
</div>
<script>
   $(function() {
      $("#nav-placeholder").load("Barra_Inicial.html");
   });
</script>

<div class="login-page"></div>
<div class="form">
   <table border="1" style='width:20%'>
      <tr>
      </tr>
</div>
</div>
<?php

$link = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");

if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['data']) == false)) { //verifica se estão preenchidos

   $sql = "INSERT INTO paciente (id_paciente, email_paciente, senha_paciente, cpf_paciente, nome_paciente, telefone_paciente, endereco_paciente, data_nasc_paciente) values ('$P_Email', '$P_Senha', '$P_Cpf', '$P_Nome', '$P_Telefone', '$P_Enderecp', '$P_Data')";

   $resultado = mysqli_query($link, $sql) or die("Erro ao tentar gravar as informações!");

   echo "Cadastrado feito com sucesso";
} else {
   echo "Dados não preenchidos";
}

?>
</body>

</html>