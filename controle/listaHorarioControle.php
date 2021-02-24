<?php
require_once "../../modelo/meuCorteModelo.php";
session_start();
$idUsuario= $_SESSION['id'];
$mCorte = new meuCorteModelo();
if($mCorte->listaHorario($idUsuario)== true){
    header("Location:../visao/horario/meuhorario.php");
}

?>