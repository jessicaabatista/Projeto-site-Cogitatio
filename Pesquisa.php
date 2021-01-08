<?php
   // arquivo de conexão com o banco de dados:
   include_once("database.php");
   
   // Recebendo os dados a inserir
  $F_Nome = $_POST['nome'];
?>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Pesquisa</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="Estilo.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>      
</head>


 
<!-- Criando tabela e cabeçalho de dados: -->
<div class="login-page"></div>
  <div class="form">
  <table border="1" style='width:50%'>
    <tr>
        <th>NOME</th>
        <th>CPF</th>
    </tr>
  </div>
</div>
 
<?php
    $sql = "SELECT * FROM funcionario WHERE nome_funcionario = '$F_Nome'";
    $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
   
    while ($registro = mysqli_fetch_array($resultado)){
      $F_Nome = $registro['nome_funcionario'];
      $F_Cpf = $registro['cpf_funcionario'];
      echo "<tr>";
      echo "<td>".$F_Nome."</td>";
      echo "<td>".$F_Cpf."</td>";
      echo "</tr>";
    }
    mysqli_close($strcon);
    echo "</table>";

?>

