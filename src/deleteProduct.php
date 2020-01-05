<?php
include_once "../class/Product.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$productManager = new TeaStoreManager();
$productId = $_GET["Id"];
$productManager->deleteProduct($productId);
header("Location:productList.php");