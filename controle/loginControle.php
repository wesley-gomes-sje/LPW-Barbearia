<?php
session_start();
require_once '../modelo/loginModelo.php';
$mLogin = new loginModelo();
$nome = $mLogin->setnome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
$senha = $mLogin->setsenha(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

if (empty($mLogin->getnome()) && empty($mLogin->getsenha())) {
    header("Location: ../visao/login/login.php?id=msgErro&msg=Por%20favor%20preencher%20todos%20os%20campos!!");
}
 else {
    if ($mLogin->getnome() != $nome) {
        header("Location: ../visao/login/login.php?id=msgErro&msg=Nome%20de%20usuario%20está%20inválido!!");
    }
    if ($mLogin->getsenha() != $senha) {
        header("Location: ../visao/login/login.php?id=msgErro&msg=A%20senha%20está%20incorreta!!");
    }
    if ($mLogin->login($mLogin->getnome(), $mLogin->getsenha()) == true) {

        if ($_SESSION['status'] == "2") {

            header("Location: ../visao/menuAdm.php");
        } else if ($_SESSION['status'] == "1") {
            
            header("Location: ../visao/menuUsuario.php");
        }
    }
}
