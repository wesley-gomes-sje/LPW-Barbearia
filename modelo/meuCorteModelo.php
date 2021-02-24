<?php
require_once "../../conexao.php";
class meuCorteModelo
{
  
    public function listaHorario($id)
    {
        $conexao = new conexao();
        try {
            $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
            $sql = $con->prepare("SELECT v.idVenda,h.idHorario,c.idCorte,c.nomeCorte,c.preco,c.imagem,h.data,h.hora FROM venda v INNER JOIN usuario u ON v.idUsuario=u.idUsuario INNER JOIN horario h ON v.idHorario=h.idHorario  INNER JOIN corte c ON v.idCorte=c.idCorte  WHERE u.idUsuario=:idUsuario AND v.status=1 ORDER BY h.data, h.hora ASC ;");
            $sql->bindValue(":idUsuario",$id);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $query = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($query as $linha) {
                    echo
                    "
                     <div id='cartao'>
                        <div id='esquerda'> <img id='img' src='" . $linha['imagem'] . "' alt='srcset'> </div>
                        <div id='direita'>
                            <div id='nome'> <p>Corte: " . $linha['nomeCorte'] . "</p></div>
                            <div id='preco'> <p>Preço: R$ " . $linha['preco'] . "</p></div>
                            <div id='data'> <p> Data: " . $linha['data'] . "</p></div>
                            <div id='hora'> <p>Hora: " . $linha['hora'] . "</p></div>
                        
                        </div>
                        </div>
                        <br>
    
                    ";
                }
            }
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }
}
