<?php
require_once '../../conexao.php';
        try {
            $conexao = new conexao();
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = $con->prepare("SELECT nome,telefone FROM usuario WHERE status='1';");
            $sql->execute();
            if ($sql->rowCount()>0) {
                 $data = $sql->fetchAll(PDO::FETCH_ASSOC);
                 foreach($data as $linha){
                     echo '<td>'
                     .$linha['nome'].
                    '</td>';
                    echo '<td>'
                     .$linha['telefone'].
                    '</td><tr>';
                 }
                 return true;
                var_dump($data);
            } else {
                return array();
            }
        } catch (PDOException $e) {
            $e->getMessage();
            return array();
        }
    