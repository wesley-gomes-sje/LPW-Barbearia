<?php
require_once "../../conexao.php";
try {

    $conexao = new conexao();

    $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
    $sql = $con->prepare("SELECT idHorario, data,hora FROM horario WHERE status=1;");
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $query = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($query as $linha) {
            echo '<td>'
                .$linha['data'].
                '</td>';
            echo '<td>'
                .$linha['hora'].
                '</td>
                    <td>
                    <a href="./editar.php?id='.$linha['idHorario'].'">
                    <button type="button" class="btn-editar">Editar</button>
                    </a>
                    <a href="../../controle/excluir.php?id=' . $linha['idHorario'] . '">
                    <button type="button" class="btn-excluir">Excluir</button>
                    </a>
                    </td>
                    </tr>';
        }
        return true;
    } else {
        return array();
    }
} catch (PDOException $e) {
    $e->getMessage();
    return array();
}
