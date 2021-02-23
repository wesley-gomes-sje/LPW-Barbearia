<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes</title>
  <link rel="shortcut icon" href="../../imagens/anonimo.png" />
  <link rel="stylesheet" href="cliente.css">
</head>
<body>
  <div id="cabecalho">
   <a id="voltar" href="../menuAdm.php"><img id="logo" src="../../imagens/bigode.png"></a>
<h1>Clientes</h1>
</div>
<table>
<tr>
<th>NOME</th>
<th>CONTATO</th>
</tr>
<?php
require_once  '../../modelo/clienteModelo.php';
?>
</table>
</body>