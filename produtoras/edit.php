<?php
require_once '../php/init.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;
$descricao = isset($_POST['descrProdutora']) ? $_POST['descrProdutora'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;

if (empty($id)) {
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE produtoras SET nome = :nome, descrProdutora = :descricao WHERE id = :id"; // Combine both updates into a single query
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: ../msgSucesso.html');
} else {
    echo "Erro ao alterar!";
    print_r($stmt->errorInfo());
}
?>
