<?php
require_once "../../conexao.php";
try {

    $conexao = new conexao();

    $con = new PDO($conexao->dsn, $conexao->user, $conexao->pass);
    $sql = $con->prepare("SELECT idHorario, data,hora FROM horario WHERE status=1 ORDER BY data, hora ASC ;");
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
                    <form action="../../controle/salvar.php" method="POST">
                    <input type="hidden" name="idCorte" value="'.$_GET['id'].'">
                    <input type="hidden" name="idHora" value="'.$linha['idHorario'].'">
                    <button type="subimit" class="btn-editar">Agendar</button>
                    </form>
                    </td>
                    </tr>';
        }
        return true;
    } else {
        echo'<p id="erro">Desculpe-me sem horarios disponíveis</p>';
        return false;
    }
} catch (PDOException $e) {
    $e->getMessage();
    return array();
}
