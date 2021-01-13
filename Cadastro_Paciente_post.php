<?php
include_once("Barra_Inicial.php");
session_start();
session_destroy();
// arquivo de conexão com o banco de dados:
include_once("database.php");

$P_Email = $_POST['email'];
$P_Senha = $_POST['senha'];
$P_Cpf   = $_POST['cpf'];
$P_Nome  = $_POST['nome'];
$P_Telefone = $_POST['telefone'];
$P_Endereco = $_POST['endereco'];
$P_Data = $_POST['data'];
$P_Psicologo = $_POST['psicologo'];

$datenow = date('Y-m-d');
$date1 = new DateTime($P_Data);
$date2 = new DateTime($datenow);
$interval = $date1->diff($date2);

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<?php
if ((empty($_POST['email']) == false) and (empty($_POST['senha']) == false) and (empty($_POST['cpf']) == false) and (empty($_POST['nome']) == false) and (empty($_POST['telefone']) == false) and (empty($_POST['endereco']) == false) and (empty($_POST['data']) == false) and (empty($_POST['psicologo']) == false) and ($interval->y >= 18)) { //verifica se estão preenchidos

  $sql = "INSERT INTO paciente (email_paciente, senha_paciente, cpf_paciente, nome_paciente, telefone_paciente, endereco_paciente, data_nasc_paciente, fk_psicologo) values ('$P_Email', '$P_Senha', '$P_Cpf', '$P_Nome', '$P_Telefone', '$P_Endereco', '$P_Data', '$P_Psicologo')";

  mysqli_query($strcon, $sql) or die("Erro ao tentar gravar as informações! Algum dado pode já estar cadastrado ou incompleto");

  echo '<div class="login-page">
  </div>
  <div class="form">
  <p>Cadastrado feito com sucesso!</p>
  </div>
  </div>';
} else {
  if ($interval->y < 18) {
    echo '<div class="login-page">
    </div>
    <div class="form">
    <p>Para se cadastrar o usuário deve ter 18 anos ou mais!</p>
    </div>
    </div>';
  } else {
    echo '<div class="login-page">
    </div>
    <div class="form">
    <p>Dados não preenchidos!</p>
    </div>
    </div>';
  }
}


?>