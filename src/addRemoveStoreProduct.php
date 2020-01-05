<?php
include_once "../class/Product.php";
include_once "../class/Store.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$teaStoreManager = new TeaStoreManager();
$storeId = $_GET["storeId"];
$store = $teaStoreManager->getStoreById($storeId);
$productsInStore = $teaStoreManager->getProductInStore($storeId);
$productsNotInStore = $teaStoreManager->getProductNotInStore($storeId);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once "../layout/navbar.php"?>

    <div class="card-body text-success">
        <h5 class="card-title">Store: <?php echo $store->getStoreName() ?></h5>
    </div>
    <div class="card-body text-success">
        <h5 class="card-title">Store Product list</h5>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col"> Name</th>
                <th scope="col"> Price</th>
                <th scope="col">Toppings</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productsInStore as $product): ?>
                <tr>
                    <th scope="row"><?php echo $product->getProductId() ?></th>
                    <td><?php echo $product->getProductName() ?></td>
                    <td><?php echo $product->getProductPrice() ?></td>
                    <td><?php echo $product->getProductToppings() ?></td>

                    <td>
                        <a href="removeStoreProduct.php?productId=<?php echo $product->getProductId() ?>&&storeId=<?php echo $store->getStoreId() ?>"
                           class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div class="card-body text-success">
        <h5 class="card-title">Product list</h5>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col"> Name</th>
                <th scope="col"> Price</th>
                <th scope="col">Toppings</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($productsNotInStore as $product): ?>
                <tr>
                    <th scope="row"><?php echo $product->getProductId() ?></th>
                    <td><?php echo $product->getProductName() ?></td>
                    <td><?php echo $product->getProductPrice() ?></td>
                    <td><?php echo $product->getProductToppings() ?></td>

                    <td>
                        <a href="addStoreProduct.php?productId=<?php echo $product->getProductId() ?>&&storeId=<?php echo $store->getStoreId() ?>"
                           class="btn btn-danger">Add</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
