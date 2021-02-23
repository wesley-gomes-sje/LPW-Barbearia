<?php
if (isset($_POST['data'])) {
    require_once "../conexao.php";
    require_once "../modelo/horarioModelo.php";
    //$dataP = addslashes($_POST['dataP']);
    //echo $dataP;
    $id = addslashes($_POST['id']);
    $data = addslashes($_POST['data']);
    $hora = addslashes($_POST['hra']);
    $mHorario = new horarioModelo();
    $mHorario->setdata($data);
    $mHorario->sethora($hora);
    //$mHorario->pesquisar($dataP);
    if ($mHorario->editar($id, $data, $hora) == true) {
        header("Location: ../visao/horario/horario.php");
    }
   else if ($mHorario->excluir($id)) {
        header("Location: ../visao/horario/horario.php");
    }
}

