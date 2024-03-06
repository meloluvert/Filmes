<?php
    require_once '../php/init.php';
    $PDO = db_connect();
    $sql = "SELECT F.nome, F.ano, F.paisOrigem,F.sinopse, P.nome as produtora_nome FROM filmes as F inner join produtoras as P on F.id_produtora = P.id";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table>
<thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
                <th scope="col">País de Origem</th>
                <th scope="col">Sinopse</th>
                <th scope="col">produtora</th>
            </tr>
        </thead>
        <tbody><?php while ($filmes = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <th><?php echo $filmes['nome'] ?></th>
            <td><?php echo $filmes['ano'] ?></td>
            <td><?php echo $filmes['paisOrigem'] ?></td>
            <td><?php echo $filmes['sinopse'] ?></td>
            <td><?php echo $filmes['produtora_nome'] ?></td>
            <!-- como colocar nomeProdutora e ele não crashar com duas chaves de nome ? -->
            <?php endwhile; ?>
        </tbody>

</table>
    
</body>
</html>