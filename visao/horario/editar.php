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
            <h1>Editar Horarios</h1>
            <form method="POST" action="../../controle/editarControl.php">
                <?php
                require_once "../../conexao.php";
                require_once "../../modelo/horarioModelo.php";
                $id = $_GET['id'];
                $mHorario = new horarioModelo();
                $mHorario->pesquisar($id);
                ?>
            </form>
        </div>
</body>