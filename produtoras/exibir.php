<?php
    require_once '../php/init.php';
    $PDO = db_connect();
    $sql = "SELECT * FROM produtoras";
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
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <!-- Tabela de produtoras -->
        <tbody><?php while ($produtoras = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <th><?php echo $produtoras['nome'] ?></th>
            <td><?php echo $produtoras['descrProdutora'] ?></td>
            <?php endwhile; ?>
        </tbody>


</table>

    
</body>
</html>