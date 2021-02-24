<?php
require_once '../../conexao.php';


try{
    $conexao = new conexao();
    $con= new PDO($conexao->dsn,$conexao->user,$conexao->pass);
    $sql = $con->prepare("SELECT idCorte,nomeCorte,preco,imagem FROM corte;");
    $sql->execute();
    if($sql->rowCount()>0){
        $query = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($query as $linha){
            echo
            "
            <div id='cartao'>
            <div id='esquerda'> <img id='img' src=".$linha['imagem'] ." alt='srcset'> </div>
              <div id='direita'>
              <div id='nome'> <p>".$linha['nomeCorte'] ."</p>  </div>
              <div id='preco'> <p> R$ ".$linha['preco'] ."</p>  </div>
              <a href='./cortar.php?id=".$linha['idCorte']."'>
              <input id='cortar' type='submit' name='corte' value='CORTAR'>
              </a>
              </div>
              </div>
              <br>
           ";
        }
        }
}catch (PDOException $e) {
    $e->getMessage();
    return array();
}