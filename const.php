
<!-- 
Você de estar se perguntando: pq este arquivo?
Isso é pq meus aqrquivos das pastas, qunado carregavam nav.css estavam pegando o caminho relativo à eles, e não ou navbar.php, após um tempo, descobri que uma solução seria colocar um caminho absoluto. Para tal, chatgpt me ajudou nessa tarefa
-->
<?php
// Obtém o esquema (http ou https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Obtém o host
$host = $_SERVER['HTTP_HOST'];

// Obtém o caminho do arquivo atual
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Constrói a BASE_URL
define('BASE_URL', "$protocol://$host$uri/");
?>
