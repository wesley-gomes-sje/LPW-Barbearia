<?php
    require_once "../conexao.php";
    require_once "../modelo/horarioModelo.php";;
    $id = addslashes($_GET['id']);
    $mHorario = new horarioModelo();
    if ($mHorario->excluir($id)) {
        header("Location: ../visao/horario/horario.php");
    }
