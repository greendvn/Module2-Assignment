<?php
include_once "../class/Store.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$storesManager = new TeaStoreManager();

$storeId = $_GET["Id"];
$storesManager->deleteStore($storeId);
header("Location:storeList.php");