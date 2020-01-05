<?php
include_once "../class/Product.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$productManager = new TeaStoreManager();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once "../layout/navbar.php"?>

    <h5 class="card-title">Add new Product </h5>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productToppings = $_POST ["productToppings"];
        if($productName != NULL && $productPrice!= NULL && $productToppings !=NULL) {
            $productManager->addProduct($productName,$productPrice,$productToppings);
            header("Location:productList.php");
        } else
            echo "Các trường không được để trống";

    }
    ?>
    <form method="post">
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control"  name="productName" placeholder="Name">
        </div>
        <div class="form-group">
            <label >Price</label>
            <input type="text" class="form-control" name="productPrice" placeholder="0.0">
        </div>
        <div class="form-group">
            <label>Toppings</label>
            <textarea class="form-control" name="productToppings" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>

    </form>


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
