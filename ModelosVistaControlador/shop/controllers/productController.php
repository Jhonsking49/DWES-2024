<?php

if(!empty($_GET["addProduct"])){
    include("views/NewProductView.php");
    die;
}
if(!empty($_POST["addProduct"])){
    ProductRepository::addProduct($_POST,$_FILES);
}

?>