<?php
require_once "../../modelo/vendaModelo.php";
session_start();
$idUsuario= $_SESSION['id'];
$mVenda = new vendaModelo();
if($mVenda->listaHorario($idUsuario)== true){
    header("Location:../visao/horario/meuhorario.php");
}

?>