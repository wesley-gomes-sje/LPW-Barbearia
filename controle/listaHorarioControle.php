<?php
session_start();
require_once "../../modelo/meuCorteModelo.php";
$idUsuario= $_SESSION['id'];
$mCorte = new meuCorteModelo();
if($mCorte->listaHorario($idUsuario)== true){
    header("Location:../visao/horario/meuhorario.php");
}

?>