<?php
if (isset($_POST['data'])) {
 require_once "../conexao.php";
    require_once "../modelo/horarioModelo.php";
    //$dataP = addslashes($_POST['dataP']);
    //echo $dataP;
    $data = addslashes($_POST['data']);
    $hora = addslashes($_POST['hra']);
    $mHorario = new horarioModelo();
    $mHorario->setdata($data);
    $mHorario->sethora($hora);
    //$mHorario->pesquisar($dataP);
    if($mHorario->salvar()== true){
        header("Location: ../visao/horario/horario.php");
    }
    
}
