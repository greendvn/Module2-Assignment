<?php

include_once "../class/StoreProduct.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$storesProductManager = new TeaStoreManager();
$storeId = $_GET["storeId"];
$productId = $_GET["productId"];
$storesProductManager->removeStoreProduct($storeId, $productId);
header("Location:addRemoveStoreProduct.php?storeId=$storeId");


