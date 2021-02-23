<?php
require_once '../conexao.php';
class loginModelo{


    private $nome;
    private $senha;
    public function __construct()
    {

    }
    public function getnome()
    {
        return $this->nome;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;
    }

    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }


    public function login($nome,$senha)
    {
        try {

            $conexao = new conexao();
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = $con->prepare("SELECT idUsuario,nome,senha,status FROM usuario WHERE nome=:nome and senha=:senha and status !=0;");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":senha", $senha);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $query = $sql->fetchAll(PDO::FETCH_ASSOC);
                print_r($query);
                $_SESSION['id'] = $query[0]['idUsuario'];
                $_SESSION['nome'] = $query[0]['nome'];
                $_SESSION['senha'] = $query[0]['senha'];
                $_SESSION['status'] = $query[0]['status'];
                return true;
            } else {
                unset($_SESSION['id']);
                unset($_SESSION['nome']);
                unset($_SESSION['senha']);
                unset($_SESSION['status']);
            
                return false;
            }
        } catch (PDOException $e) {
            //$e->getMessage();         return array();     }
        }
    }

}
