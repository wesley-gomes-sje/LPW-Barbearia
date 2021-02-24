<?php
require_once "../conexao.php";
class vendaModelo
{
    private $idUsuario;
    private $idHorario;
    private $idCorte;
    public function __construct()
    {
        
    }
    public function getidUsuario()
    {
        return $this->idUsuario;
    }
    public function setidUsuairo($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getidHorario()
    {
        return $this->idHorario;
    }
    public function setidHorario($idHorario)
    {
        $this->idHorario = $idHorario;
    }

    public function getidCorte()
    {
        return $this->idCorte;
    }
    public function setidCorte($idCorte)
    {
        $this->idCorte = $idCorte;
    }
    public function salvarVenda()
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = 'INSERT INTO venda (idUsuario,idHorario,idCorte) VALUES (?,?,?);';
            $pre = $con->prepare($sql);
            $pre->bindValue(1, $this->idUsuario);
            $pre->bindValue(2, $this->idHorario);
            $pre->bindValue(3, $this->idCorte);
            if ($pre->execute()) {
                echo $pre->rowCount();
                return true;
            } else {
                print_r($pre->errorInfo());

                return false;
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }
}
