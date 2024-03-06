<?php
    require '../php/init.php';
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if (empty($id))
    {
        echo "ID para alteração não definido";
        exit;
    }
    $PDO = db_connect();
    $sql = "SELECT * FROM produtoras WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $produtoras = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!is_array($produtoras))
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
Nova produtora
    <form action="edit.php" method="post" >
    <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="nome" id="" placeholder="nome" value="<?php echo $produtoras['nome'] ?>">
        <input type="text" name="descrProdutora" id="" placeholder="Descrição" value="<?php echo $produtoras['descrProdutora'] ?>">
        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>