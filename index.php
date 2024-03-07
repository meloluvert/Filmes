<?php
include_once 'const.php';
?>

<!-- Comum à todos os sites -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#menu").load("navbar.php");
            });
        });
    </script>
</head>

<body>
    <div id="menu"> </div>
    <div class="row d-flex justify-content-center align-items-center father-card"
        style="width: 100%; padding: 0; margin: 0;">
        <div class="content col-8 my-card display-7">
            <p>Este é um projeto web baseado nas funcionalidades e design da Netflix. Ele foi desenvolvido utilizando tecnologias como PHP, HTML, CSS e MySQL. O objetivo principal do projeto é disponibilizar entretenimento de forma universal, reunindo filmes e séries em uma única plataforma.Aqui você pode:</p>

                <ul>
                    <li>Cadastrar</li>
                    <li>Listar</li>
                    <li>Pesquisar</li>
                </ul>
            <p>Fazer isso com seus filmes e produtoras preferidos... se divirta!</p>
        </div>
        <div class="blur"></div>
</body>

</html>