
<?php
require_once '../modelo/usuarioModelo.php';
if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);

    $mUsuario = new usuarioModelo();
    $mUsuario->setnome($nome);
    $mUsuario->settelefone($telefone);
    $mUsuario->setsenha($senha);

    if (empty($nome) || empty($telefone) || empty($senha) || empty($confSenha)) {

        header("Location: ../visao/cadastro/cadastro.php?id=msgErro&msg=Por%20favor%20preencher%20todos%20os%20campos!!");
    } else {

        if ($senha == $confSenha) {
            // var_dump($mUsuario->verificar($nome));
            if ($mUsuario->verificar($nome) == true) {

                header("Location: ../visao/cadastro/cadastro.php?id=msgErro&msg=Erro!%20Usuario%20existente!!");
            } else {
                $mUsuario->cadastrar();
                header("Location: ../visao/cadastro/cadastro.php?id=msgCadastro&msg=Cadastrado%20com%20sucesso!%20Acesse%20para%20entrar!");
            }
        } else {

            header("Location: ../visao/cadastro/cadastro.php?id=msgErro&msg=As%20senhas%20não%20são%20identicas!!");
        }
    }
}



?>