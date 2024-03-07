<?php
 include_once ('const.php')
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>style/nav.css">
<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
<style>

</style>
</head>
<body>

<div class="sidenav">
  <a href="<?php echo BASE_URL ?>index.php">Início</a>
  <button class="dropdown-btn">Filmes
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="<?php echo BASE_URL ?>filmes/exibir.php">Listar Filmes</a>
    <a href="<?php echo BASE_URL ?>filmes/formAdd.php">Cadastrar Filmes</a>
    <a href="<?php echo BASE_URL ?>filmes/pesquisa.html">Pesquisar Filmes</a>
  </div>
  <button class="dropdown-btn">Produtoras
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="<?php echo BASE_URL ?>produtoras/exibir.php">Listar Produtoras</a>
    <a href="<?php echo BASE_URL ?>produtoras/formAdd.html  ">Cadastrar Produtoras</a>
    <a href="<?php echo BASE_URL ?>produtoras/pesquisa.html">Pesquisar Produtoras</a>
  </div>
</div>


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

</body>
</html> 
