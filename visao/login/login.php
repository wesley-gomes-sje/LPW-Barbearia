<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Shelby</title>
    <link rel="shortcut icon" href="../../imagens/bigode.png"/>
    <link rel="stylesheet" href="login.css">
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
    <div id="corpoForm"><img style="width: 100px;" src="../../imagens/bigode.png">
    <div id="<?php echo "$id" ?>">

            <strong> <?php echo "$msg" ?></strong>

        </div>
        <h1>LOGIN</h1>
        <form method="POST" action="../../controle/loginControle.php">
            <input type="text" name="nome" placeholder="Usuario">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ENTRAR">
            <a href="../cadastro/cadastro.php"> Ainda não é cliente?<strong>Cadastre-se!</strong>
        </form>
    </div>
</body>

</html>