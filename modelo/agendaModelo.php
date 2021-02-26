<?php
require_once '../../conexao.php';


try {
    $conexao = new conexao();
    $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
    $sql = $con->prepare("SELECT v.idVenda,u.nome,u.telefone,c.nomeCorte,c.preco,date_format(`data`,'%d/%m/%Y') AS data,h.hora FROM venda v INNER JOIN usuario u ON v.idUsuario=u.idUsuario INNER JOIN corte c ON v.idCorte=c.idCorte INNER JOIN horario h ON v.idHorario=h.idHorario WHERE v.status= 1 ORDER BY h.data,h.data ASC ;");
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $query = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($query as $linha) {
            echo
            "
            <div id='cartao'>
            <div id='esquerda'> <img id='img' src='../../imagens/user.png'> </div>
              <div id='direita'>
              <div id='nome'> <p>Cliente: " . $linha['nome'] . "</p>  </div>
              <div id='telefone'> <p>Telefone: " . $linha['telefone'] . "</p>  </div>
              <div id='corte'> <p>Corte: " . $linha['nomeCorte'] . "</p>  </div>
              <div id='preco'> <p>Preço R$ " . $linha['preco'] . "</p>  </div>
              <div id='data'> <p>Data: " . $linha['data'] . "</p>  </div>
              <div id='hora'> <p>Hora: " . $linha['hora'] . "</p>  </div>
              <a href='../../controle/feito.php?id=" . $linha['idVenda'] . "'>
              <button id='feito' type='button'>FEITO</button>
              </a>
              </div>
              </div>
              <br>
           ";
        }
    }
} catch (PDOException $e) {
    $e->getMessage();
    return array();
}