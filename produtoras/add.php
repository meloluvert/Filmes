<?php
require_once '../php/init.php';
$descricao = isset($_POST['descrProdutora']) ? $_POST['descrProdutora'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
if (empty($descricao) || empty($nome)) {
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO produtoras(descrProdutora,nome) VALUES(:descrProdutora,:nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descrProdutora', $descricao);
$stmt->bindParam(':nome', $nome);
if ($stmt->execute()) {
    header('Location: ../msgSucesso.html');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
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
    <table>
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <!-- Tabela de produtoras -->
        <tbody>
            <?php while ($produtoras = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th>
                        <?php echo $produtoras['nome'] ?>
                    </th>
                    <td>
                        <?php echo $produtoras['descrProdutora'] ?>
                    </td>

                    <td> <a class="btn btn-primary" href="formEdit.php?id=<?php echo $produtoras['id'] ?>">&#128394 </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $produtoras['id'] ?>"
                            onclick="return confirm('Tem certeza de que deseja remover?');">x</a>
                    </td>

                </tr>
            <?php endwhile; ?>
        </tbody>


    </table>


</body>

</html>