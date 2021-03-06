<?php
include_once "../class/Store.php";
include_once "../class/TeaStoreManager.php";
include_once "../data/DBConnect.php";
include_once "../data/TeaStoresDB.php";

$storesManager = new TeaStoreManager();
$stores = $storesManager->getListStore();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stores</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once "../layout/navbar.php"?>

    <div class="card-body text-success">
        <h5 class="card-title">Stores list</h5>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Store Name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($stores as $store): ?>
                <tr>
                    <th scope="row"><?php echo $store->getStoreId() ?></th>
                    <td><?php echo $store->getStoreName() ?></td>
                    <td><a href="deleteStore.php?Id=<?php echo $store->getStoreId() ?>"
                           onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a>
                        <a href="editStore.php?Id=<?php echo $store->getStoreId() ?>"
                           class="btn btn-danger">Edit</a>
                        <a href="addRemoveStoreProduct.php?storeId=<?php echo $store->getStoreId() ?>"
                           class="btn btn-danger">Add/Remove Product</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="addStore.php">Add new Store</a>
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
