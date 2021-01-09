<?php
session_start();

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$Email = mysqli_real_escape_string($link, $_POST['usuario']);

$Senha = mysqli_real_escape_string($link, $_POST['senha']);

if ($Email != "" && $Senha != "") {

    //----------------------------------------------------

    $sql_query = "SELECT count(*) AS cntUser FROM psicologo WHERE email_psicologo = ' $Email ' and senha_psicologo = ' $Senha '";

    $result_psicologo = mysqli_query($link, $sql_query);

    $row_psicologo = mysqli_fetch_array($result);

    $count_psicologo = $row_psicologo['cntUser'];

    //----------------------------------------------------

    $sql_query = "SELECT count(*) AS cntUser FROM paciente WHERE email_paciente = ' $Email ' and senha_paciente = ' $Senha '";

    $result_paciente = mysqli_query($link, $sql_query);

    $row_paciente = mysqli_fetch_array($result);

    $count_paciente = $row_paciente['cntUser'];

    //----------------------------------------------------

    $sql_query = "SELECT count(*) AS cntUser FROM funcioario WHERE email_funcioario = ' $Email ' and senha_funcioario = ' $Senha '";

    $result_funcioario = mysqli_query($link, $sql_query);

    $row_funcioario = mysqli_fetch_array($result);

    $count_funcioario = $row_funcioario['cntUser'];


    if ($count_psicologo > 0) {

        $sql = "SELECT id_psicologo FROM psicologo WHERE email_psicologo = '$Email' AND senha_psicologo = '$Senha'";

        $id = mysqli_query($link, $sql);

        $_SESSION['usuarioLogado'] = $Email;
        $_SESSION['id_psicologo'] = $id;

        header('Location: Inicial_Psicologo.php');

    } else if ($count_paciente > 0) {

        $sql = "SELECT id_paciente FROM paciente WHERE email_paciente = '$P_Email' and senha_paciente = '$P_Senha'";
  
        $id = mysqli_query($link, $sql);
  
        $_SESSION['usuarioLogado'] = $P_Email;
        $_SESSION['id_paciente'] = $id;
  
        header('Location: Inicial_Paciente.php');

      } else if ($count_funcioario > 0) {

        $sql = "SELECT id_funcionario FROM funcionario WHERE email_funcionario = '$F_Email' and senha_funcionario = '$F_Senha'";
  
        $id = mysqli_query($link, $sql);
  
        $_SESSION['usuarioLogado'] = $P_Email;
        $_SESSION['id_funcionario'] = $id;
  
        header('Location: Inicial_Funcionario.php');

      } else {

        header('Location: Login.html');
  
        echo "Usuario invalido";
      }
}
