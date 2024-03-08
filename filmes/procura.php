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
    $sql = "SELECT F.nome,F.id, F.ano, F.paisOrigem,F.sinopse, F.img_link as link, P.nome as produtora_nome FROM filmes as F  inner join produtoras as P on F.id_produtora = P.id WHERE upper(F.nome) like :nome";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([':nome' => $pesquisa]);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Filmes</title>

    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#menu").load("../navbar.php");
            });
        });
    </script>
</head>

<body>
    <div id="menu"> </div>
    <div class="row d-flex justify-content-center align-items-center father-card"
        style="width: 100%; padding: 0; margin: 0;">
        <div
            class="content col-8  display-7 d-flex flex-wrap flex-row align-items-center justify-content-around my-card align-content-around">

            <h3 class="w-100">Exibir Filmes</h3>
            <?php while ($filmes = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="card d-inline-flex col-5 m-1 my-mini-card">
                    <!-- <img class="card-img-top" src=".../100px180/" alt="Imagem de capa do card"> -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $filmes['nome'] ?>,
                            <?php echo $filmes['ano'] ?>
                        </h5>
                        <p class="card-text">
                            Produtora:
                            <?php echo $filmes['produtora_nome'] ?><br>

                            País:
                            <?php echo $filmes['paisOrigem'] ?> <br>
                            Sinopse:
                            <?php echo $filmes['sinopse'] ?><br>
                        </p>
                        <a class="btn btn-primary edit-btn " href="formEdit.php?id=<?php echo $filmes['id'] ?>">&#128394</a>
                        <a class="btn btn-danger remove-btn" href="delete.php?id=<?php echo $filmes['id'] ?>"
                            onclick="return confirm('Tem certeza de que deseja remover?');">&#128465;</a>
                    </div>

                <div class="img_link" style="background-image: url(<?php echo $filmes['link'] ?>);"></div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="blur"></div>
</body>

</html>