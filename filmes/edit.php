<?php
    require_once '../php/init.php';
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    if (empty($nome))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE filmes SET nome = :nome WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: ../msgSucesso.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }
?>