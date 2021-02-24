<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Horarios</title>
  <link rel="shortcut icon" href="../../imagens/anonimo.png" />
  <link rel="stylesheet" href="../../css/menuAdm.css">
  <div id="cabecalho">
    <a id="voltar" href="../menuUsuario.php"><img id="logo" src="../../imagens/bigode.png"></a>
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

  <div id="lista">
    <h1>Escolha um horario</h1>
    <table>
      <br>
      <tr>
        <th>DATA</th>
        <th>HORA</th>
        <th>OPÇÃO</th>
      </tr>
      <?php
      require_once  "../../modelo/listarCorte.php";
      ?>
    </table>
  </div>
</div>
</body>