<?php
require_once '../php/init.php';
$PDO = db_connect();
$sql = "SELECT * FROM produtoras 
";
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
    <form action="add.php" method="post">
        <input type="text" name="nome" id="" placeholder="Nome">
        <input type="number" name="ano" id="" placeholder="ano">
        <input type="text" name="pais" id="" placeholder="País">
        <input type="text" name="sinopse" id="" placeholder="Sinopse">
        <select name="id_produtora" id="">
        <?php while ($produtoras = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

            <option value=" <?php echo $produtoras['id'] ?> ">
                <?php echo $produtoras['nome'] ?>
            </option>

        <?php endwhile; ?>
        </select>
        <button type="submit"></button>
    </form>

</body>

</html>