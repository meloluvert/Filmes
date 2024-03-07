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
    $sql = "SELECT * FROM produtoras WHERE upper(nome) like :nome";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([':nome' => $pesquisa]);
?>

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
            <?php while ($pesquisa = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th>
                        <?php echo $pesquisa['nome'] ?>
                    </th>
                    <td>
                        <?php echo $pesquisa['descrProdutora'] ?>
                    </td>
                   
                    <td> <a class="btn btn-primary" href="formEdit.php?id=<?php echo $pesquisa['id'] ?>">&#128394 </a></td>
                    <td>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $pesquisa['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">x</a>
                    </td>

                </tr>
            <?php endwhile; ?>
        </tbody>


    </table>
