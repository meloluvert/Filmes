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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar filmes</title>

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

            <h3 class="w-100">Editar Filmes</h3>



            <form class="form-inline col-10 my-lg-0" action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <div class="form-floating">
                        <input type="text" name="nome" id="floatingInput" value="<?php echo $filmes['nome'] ?>" class="form-control" placeholder="Fox">

                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Editar</button>
                </div>
            </form>
        </div>
        <div class="blur"></div>
</body>

</html>