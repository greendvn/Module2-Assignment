<?php
include_once "class/Store.php";
include_once "class/Product.php";
include_once "class/StoreProduct.php";
include_once "class/TeaStoreManager.php";
include_once "data/DBConnect.php";
include_once "data/TeaStoresDB.php";

$teaStoreManager = new TeaStoreManager();
$stores = $teaStoreManager->getListStore();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Milk Tea store manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-2  bg-info text-white"
             style="padding-left: 0px;padding-right: 0px; text-align: center; min-height: 100vh">
            <label style="margin-bottom: 50px; padding-top: 30px;"><h6>Milk Tea Store</h6></label>

            <div class="list-group  bg-info text-white" id="list-tab" role="tablist">
                <?php foreach ($stores as $key => $store): ?>
                    <a class="list-group-item list-group-item-action  bg-info text-white <?php if ($key == 0): ?> active <?php endif; ?>" "
                    data-toggle="list"
                    href="#store<?php echo $store->getStoreId() ?>" role="tab"
                    style="border: none"><?php echo $store->getStoreName() ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="nav-tabContent">
                <?php include_once "layout/navbar.php"?>

                <?php foreach ($stores as $key => $store): ?>
                    <div class="tab-pane fade bg-light <?php if ($key == 0): ?> show active <?php endif; ?>"
                         id="store<?php echo $store->getStoreId() ?>"
                         role="tabpanel">
                        <h2 style="margin-bottom: 50px; padding-top: 30px; text-align: center"><?php echo $store->getStoreName() ?>
                            Menu</h2>
                        <button aria-expanded="false" class="btn btn-outline-danger"
                                data-toggle="collapse" data-target="#boxnoidung">Filter
                        </button>

                        <div class="collapse mt-4" id="boxnoidung">
                            <div class="card card-body bg-warning">
                                <p class="card-text"><b>Topping: </b></p>

                                <div class="form-check form-check-inline">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                               value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Milk foam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                               value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Milk foam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                               value="option3">
                                        <label class="form-check-label" for="inlineCheckbox3">Milk foam</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $products = $teaStoreManager->getProductInStore($store->getStoreId()); ?>

                        <div class="row">
                            <?php foreach ($products as $product): ?>
                                <div class="card bg-light mb-3"
                                     style="max-width: 15rem; margin-left: 16px;margin-right: 16px;margin-top: 16px;">
                                    <div class="card-header">Name:
                                        <h5 class="card-title"><?php echo $product->getProductName() ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <b>Topping: </b><?php echo $product->getProductToppings() ?></p>
                                        <p class="card-text"><b>Price: </b><?php echo $product->getProductPrice() ?> $
                                        </p>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
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
