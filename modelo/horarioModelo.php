
<?php

class horarioModelo
{
    private $idHorario;
    private $data;
    private $hora;
    public function __construct()
    {
    }
    public function getdata()
    {
        return $this->data;
    }
    public function setdata($data)
    {
        $this->data = $data;
    }
    public function gethora()
    {
        return $this->hora;
    }
    public function sethora($hora)
    {
        $this->hora = $hora;
    }
    public function getidHorario()
    {
        return $this->idHorario;
    }
    public function setidHorario($idHorario)
    {
        $this->idHorario = $idHorario;
    }

    public function salvar()
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = 'INSERT INTO horario(data,hora) VALUES (?,?);';
            $pre = $con->prepare($sql);
            $pre->bindValue(1, $this->data);
            $pre->bindValue(2, $this->hora);
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
    public function pesquisar($idHorario)
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = $con->prepare('SELECT idHorario,hora, data FROM horario WHERE idHorario=:id;');
            $sql->bindValue(":id", $idHorario);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $query = $sql->fetchAll(PDO::FETCH_ASSOC);


                echo "
                
                <label for='data'>Data</label>
         <input type='date' id='data' name='data' value=" . $query[0]['data'] . " onclick='datamin()' required>
        <label for='hora'>Hora</label>
        <input type='time' id='hra' name='hra' value=" . $query[0]['hora'] . " required>
         <input id='btnSalvar' type='submit' value='SALVAR ALTERAÇÃO'> 
         <input type='hidden' name='id' value=" . $query[0]['idHorario'] . ">

            ";
            } else {
                unset($_SESSION['id']);
                unset($_SESSION['nome']);
                unset($_SESSION['data']);
                return false;
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function editar($idHorario, $data, $hora)
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = 'UPDATE horario SET data=:data, hora=:hora WHERE idHorario=:id;';
            $pre = $con->prepare($sql);
            $pre->bindValue(":id", $idHorario);
            $pre->bindValue(":data", $data);
            $pre->bindValue(":hora", $hora);

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
    public function excluir($idHorario)
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = 'UPDATE horario set status =0 WHERE idHorario=:id;';
            $pre = $con->prepare($sql);
            $pre->bindValue(":id", $idHorario);
            if ($pre->execute()) {
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