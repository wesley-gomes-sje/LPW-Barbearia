<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horarios</title>
  <link rel="shortcut icon" href="../../imagens/anonimo.png" />
  <link rel="stylesheet" href="../../css/menuAdm.css">
  <div id="cabecalho">
    <a id="voltar" href="../menuAdm.php"><img id="logo" src="../../imagens/bigode.png"></a>
    <h1>Horarios</h1>
  </div>
</head>
<body>
<script>
  function datamin() {
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("data").setAttribute('min', today);
  }
</script>

<div id="tudo">
  <div id="formulario">
    <h1>Cadastrar Horarios</h1>
    <form method="POST" action="../../controle/horarioControle.php">
      <label for="data">Data</label>
      <input type="date" id="data" name="data" onclick="datamin()" required>
      <label for="hora">Hora</label>
      <input type="time" id="hra" name="hra" required>
      <input id="btnSalvar" type="submit" value="SALVAR">
    </form>
  </div>

  
  <div id="lista">
    <h1>Horarios Disponíveis</h1>
    <table>
      <br>
      <tr>
        <th>DATA</th>
        <th>HORA</th>
        <th>OPÇÕES</th>
      </tr>
      <?php
      require_once  "../../modelo/listar.php";
      ?>
    </table>
  </div>
</div>


</body>