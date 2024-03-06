<?php
    require '../php/init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sql = "SELECT * FROM filmes WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $filmes = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!is_array($filmes))
    {
        echo "Nenhum cadastro encontrado";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
edit filme
    <form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="nome" id="" placeholder="Nome"  value="<?php echo $filmes['nome'] ?>">
        <button type="submit"></button>
    </form>
    
</body>
</html>