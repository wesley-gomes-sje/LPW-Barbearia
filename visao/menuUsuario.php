<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espaço do Cliente</title>
  <link rel="shortcut icon" href="../imagens/anonimo.png" />
  <link rel="stylesheet" href="../css/menu.css">
</head>
<?php
$id=null;
$msg=null;
if (array_key_exists("id", $_GET) && array_key_exists("msg", $_GET)) {
    $id = $_GET['id'];
    $msg = $_GET['msg'];
} 
?>

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
    <div id="<?php echo "$id" ?>">

            <strong> <?php echo "$msg" ?></strong>

        </div>
  </div>
  <div id="cortes">
    <a href="./cortes/corte.php"><img id="imgcorte" src="../imagens/cortes.jpg"><h1 id="txtCorte">CORTES</h1></a>
   </div>
   <div id="horarios">
     <a href="../visao/horario/meuhorario.php"> <img id="imghorario" src="../imagens/horario.jpg"><h1 id="txtHorario">HORARIOS</h1> </a>
   </div>
</body>