<?php
require_once '../php/init.php';
$descricao = isset($_POST['descrProdutora']) ? $_POST['descrProdutora'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$img_link = isset($_POST['img_link']) ? $_POST['img_link'] : null;
if (empty($descricao) || empty($nome)) {
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO produtoras(descrProdutora,nome,img_link) VALUES(:descrProdutora,:nome,:img_link)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descrProdutora', $descricao);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':img_link', $img_link);
if ($stmt->execute()) {
    header('Location: ../msgSucesso.html');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>