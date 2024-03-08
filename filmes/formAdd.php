<?php
require_once '../php/init.php';
$PDO = db_connect();
$sql = "SELECT * FROM produtoras 
";
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar filmes</title>

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

            <h3 class="w-100">Cadastrar Filmes</h3>


            <form action="add.php" class="col-10" method="post">
                <div class="form-group m-3">
                    <div class="form-floating">
                        <input type="text" name="nome" id="floatingInput" class="form-control" placeholder="f">

                        <label for="floatingInput">Nome</label>
                    </div>
                </div>
                <div class="form-group m-3">
                    <div class="form-floating">
                        <input type="nummber" name="ano" id="floatingInput" class="form-control" placeholder="f">

                        <label for="floatingInput">Ano</label>
                    </div>
                </div>
                <div class="form-group m-3">
                    <div class="form-floating">
                        <input type="text" name="pais" id="floatingInput" class="form-control" placeholder="f">

                        <label for="floatingInput">País</label>
                    </div>
                </div>
                <div class="form-group m-3">
                    <div class="form-floating">
                        <textarea name="sinopse" id="floatingInput" class="form-control" cols="30" rows="10" style="max-height: 10rem;"></textarea>
                        <label for="floatingInput">Sinopse</label>
                    </div>
                </div>
                <div class="form-group m-3">
                    <div class="form-floating">
                    <input type="text" name="img_link" id="floatingInput" class="form-control" placeholder="f">
                        <label for="floatingInput">Link de imagem</label>
                    </div>
                </div>
                <div class="form-group m-3">

                <select name="id_produtora" class="form-select" id="">
        <?php while ($produtoras = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

            <option value=" <?php echo $produtoras['id'] ?> ">
                <?php echo $produtoras['nome'] ?>
            </option>

        <?php endwhile; ?>
        </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
        <div class="blur"></div>
</body>

</html>