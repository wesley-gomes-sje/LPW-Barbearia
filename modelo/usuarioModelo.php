<?php
require_once '../conexao.php';

class usuarioModelo
{

    private $idUsuario;
    private $nome;
    private $telefone;
    private $senha;
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
    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;
    }

    public function gettelefono()
    {
        return $this->telefone;
    }
    public function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }

    public function cadastrar()
    {

        $conexao = new conexao();

        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = 'INSERT INTO usuario (nome,telefone,senha) VALUES (?,?,?);';
            $pre = $con->prepare($sql);
            $pre->bindValue(1, $this->nome);
            $pre->bindValue(2, $this->telefone);
            $pre->bindValue(3, $this->senha);
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
    public function verificar($nome)
    {
        try {

            $conexao = new conexao();
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = $con->prepare("SELECT idUsuario,nome,status FROM usuario WHERE nome=:nome and status <>0;");
            $sql->bindValue(":nome", $nome);
            $sql->execute();
            return  ($sql->rowCount() > 0);
        } catch (PDOException $e) {
            //$e->getMessage();         return false;    }
        }
    }
    
   
}
