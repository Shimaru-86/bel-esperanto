<?php
  //Configura corretamente os caracteres para serem enviados de volta para o JSON.
  header('Content-Type: application/json; charset=utf-8');

  require_once("../lib/Login.class.php");

  if($_POST) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
  }

  //A variável response guarda o resultado do login:
  if(($email != "") && ($senha != "")) { 
    $loginAccount = new Login();
    $response = $loginAccount->logar($email, $senha);
  } else {
    $response = array('userLogged' => '0');
    $response = array('userLogged' => '0', 'info' => 'Email ou senha em branco.');
  }
  
  echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>