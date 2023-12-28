<?php
  session_start();
  if(isset($_SESSION['userData']['userLogged']) && isset($_SESSION['userData']['idEstudante_PK']) ) {
    $idEstudante = $_SESSION['userData']['idEstudante_PK'];
    $logado = true;
  } else {
    $logado = false;
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEL - Esperanto</title>
  <link rel="icon" href="./src/images/favicon.ico" />
  <link rel="stylesheet" href="./src/styles/w3css_4.css">
  <link rel="stylesheet" href="./src/styles/w3theme.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="theme-color" content="#265728" />
</head>

<body>
  <?php
    if($logado) {
      include("./src/pages/Dashboard.php");
    } else {
      include("./src/pages/LoginPage.php");
    }
  ?>
</body>
</html>