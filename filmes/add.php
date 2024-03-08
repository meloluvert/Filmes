<?php
require_once '../php/init.php';
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$pais = isset($_POST['pais']) ? $_POST['pais'] : null;
$sinopse = isset($_POST['sinopse']) ? $_POST['sinopse'] : null;
$img_link = isset($_POST['img_link']) ? $_POST['img_link'] : null;
$id_produtora = isset($_POST['id_produtora']) ? $_POST['id_produtora'] : null;
if (empty($ano) || empty($nome) || empty( $pais) || empty($id_produtora) || empty($sinopse)) {
    echo "Volte e preencha todos os campos";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO filmes(ano,nome,paisOrigem,sinopse,id_produtora,img_link) VALUES(:ano,:nome,:paisOrigem,:sinopse,:id_produtora,:img_link)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_produtora', $id_produtora);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ano', $ano);
$stmt->bindParam(':paisOrigem', $pais);
$stmt->bindParam(':sinopse', $sinopse);
$stmt->bindParam(':img_link', $img_link);
if ($stmt->execute())
{
    header('Location: ../msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>