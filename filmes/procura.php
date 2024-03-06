<?php
    require '../php/init.php';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if (empty($nome))
    {
        echo "Volte e preencha o campo para pesquisa!";
        exit;
    }
    $pesquisa = '%' . $nome . '%';
    $PDO = db_connect();
    $sql = "SELECT F.nome,F.id, F.ano, F.paisOrigem,F.sinopse, P.nome as produtora_nome FROM filmes as F  inner join produtoras as P on F.id_produtora = P.id WHERE upper(F.nome) like :nome";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([':nome' => $pesquisa]);
?>

<table>
<thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col">País de Origem</th>
                <th scope="col">Sinopse</th>
                <th scope="col">produtora</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($pesquisa = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
            <th><?php echo $pesquisa['nome'] ?></th>
            <td><?php echo $pesquisa['ano'] ?></td>
            <td><?php echo $pesquisa['paisOrigem'] ?></td>
            <td><?php echo $pesquisa['sinopse'] ?></td>
            <td><?php echo $pesquisa['produtora_nome'] ?></td>
            <td> <a class="btn btn-primary" href="formEdit.php?id=<?php echo $pesquisa['id'] ?>">&#128394 </a></td>
                    <td>
            <td>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $pesquisa['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">x</a>
                    </td>
            </tr>
            <?php endwhile; ?>
        </tbody>

</table>