<?php
session_start(); // Inicia a sessão

session_destroy(); // Desloga o usuário

$response = array('logout' => '1');

//Configura corretamente os caracteres para serem enviados pelo Json de volta para o Programa.
header('Content-Type: application/json; charset=utf-8');

echo(json_encode($response, JSON_UNESCAPED_UNICODE));
?>