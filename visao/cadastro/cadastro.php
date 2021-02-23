<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Shelby</title>
    <link rel="shortcut icon" href="../../imagens/bigode.png" />
    <link rel="stylesheet" href="cadastro.css">
</head>
<?php
if (array_key_exists("id", $_GET) && array_key_exists("msg", $_GET)) {
    $id = $_GET['id'];
    $msg = $_GET['msg'];
} else {

    $id = "semmsg";
}


?>

<body>
    <div id="corpoFormCad"><img style="width: 100px;" src="../../imagens/bigode.png">
        <div id="<?php echo "$id" ?>">

            <strong> <?php echo "$msg" ?></strong>

        </div>

        <h1>CADASTRO</h1>

        <form action="../../controle/usuarioControle.php" method="post">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="80">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="11">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="confSenha" placeholder="Confirmar senha">
            <input type="submit" value="CADASTRAR">
            <a href="../login/login.php"> <strong>Voltar</strong>

        </form>

    </div>

</body>

</html>