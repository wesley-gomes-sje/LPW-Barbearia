<?php
require_once "../modelo/vendaModelo.php";
require_once "../modelo/horarioModelo.php";
session_start();
$idUsuario= $_SESSION['id'];
$idCorte = addslashes($_POST['idCorte']);
$idHora = addslashes($_POST['idHora']);
$mVenda = new vendaModelo();
$mVenda->setidCorte($idCorte);
$mVenda->setidHorario($idHora);
$mVenda->setidUsuairo($idUsuario);
if($mVenda->salvarVenda() == true){
    $mHorario = new horarioModelo();
    $mHorario->atualizar($idHora);
    header("Location:../visao/menuUsuario.php?id=msgCerto&msg=Horario%20marcado%20com%20sucesso!!");

}
else{

    header("Location:../visao/menuUsuario.php?id=msgErro&msg=Erro%20ao%20tentar%20marcar%20o%20horario!!");

}



