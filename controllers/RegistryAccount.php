<?php
  require_once("../lib/Registry.class.php");

  if($_POST)
  {
    $nome = $_POST["registryName"];
    $email = $_POST["registryEmail"];
    $telefone = $_POST["registryPhone"];
    $cpf = $_POST["registryCpf"];
    $senha = $_POST["registryPassword"];
  }

  if(($nome != "") && ($email != "") && ($telefone != "") && ($cpf != "") && ($senha != ""))
  {
    $registry = new Registry();
    $registryAccount = $registry->registryAccount($nome, $email, $telefone, $cpf, $senha);

    //Se logar corretamente, retorna a informação AJAX.
    $response = array("registry" => "$registryAccount");
    echo(json_encode($response, JSON_UNESCAPED_UNICODE)); //Retorno dado para a função AJAX.

    // 1- Registrado com sucesso.
    // 2- Email já existe.
    // 0 ou 3 - Erro no sistema.
  }
  else
  {
    $response = array("registry" => "0");
    echo(json_encode($response, JSON_UNESCAPED_UNICODE)); //Retorno dado para a função AJAX.
  }
?>