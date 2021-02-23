<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espaço do Administrador</title>
  <link rel="shortcut icon" href="../imagens/anonimo.png" />
  <link rel="stylesheet" href="../css/menuAdm.css">
</head>

<body>
  <div id="cabecalho">
    <h1>BARBEARIA SHELBY</h1>
    <img id="logo" src="../imagens/bigode.png">
    <img id="usuario" src="../imagens/usuario.png.png">
    <article id="msg">
      <?php
      session_start();
      echo '<div id="msg">Seja bem vindo <br>' . $_SESSION['nome'] . '</br> </div>';
      ?>
    </article>
  </div>
    <div id="cortes">
    <a href="./cortes/corteadm.php"><img id="imgcorte" src="../imagens/cortes.jpg"><h1 id="txtCorte">CORTES</h1></a>
   </div>
   <div id="horarios">
     <a href="../visao/horario/horario.php"> <img id="imghorario" src="../imagens/horario.jpg"><h1 id="txtHorario">HORARIOS</h1> </a>
   </div>
  <div id="clientes">
    <a href="../visao/cliente/cliente.php"><img id="imgcliente" src="../imagens/clientes.jpg"><h1 id="txtClientes">CLIENTES</h1></a>
  </div>
</body>
