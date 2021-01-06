<?php
include "Conectar.php";
?>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Login Paciente</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="Estilo.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
</head>

<?php
if(isset($_POST['logar'])){

    $P_Email = mysqli_real_escape_string($strcon,$_POST['usuario']);
    $P_Senha = mysqli_real_escape_string($strcon,$_POST['senha']);

    if ($usuario != "" && $senhaU != ""){
        $sql_query = "SELECT count(*) as cntUser from cliente where `Usuario` = '$usuario' and `SenhaCliente` = '$senhaU'";
        $result = mysqli_query($strcon,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['usuarioLogado'] = $usuario;
            header('Location: Inicial_Paciente.html');
        }else{
          header('Location: Login_Paciente.html');
            echo "Usuario invalido";
        }

    }

}
?>