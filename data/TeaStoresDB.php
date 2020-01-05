<?php


class TeaStoresDB
{
    protected $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function addStore($newStoreName)
    {
        $sql = "INSERT INTO stores(storeName) VALUES (:newStoreName)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":newStoreName", $newStoreName);
        $stmt->execute();
    }

    public function getStores()
    {
        $sql = "SELECT * FROM stores";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $stores = [];
        foreach ($result as $item) {
            $store = new Store($item["storeName"]);
            $store->setStoreId($item["storeId"]);
            array_push($stores, $store);
        }
        return $stores;
    }

    public function deleteStore($Id)
    {
        $sql = "DELETE FROM stores WHERE storeId = :Id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":Id", $Id);
        $stmt->execute();

    }

    public function getStoreById($Id)
    {
        $sql = "SELECT * FROM stores WHERE storeId = '$Id'";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $store = new Store($result["storeName"]);
        $store->setStoreId($result["storeId"]);
        return $store;
    }

    public function editStoreById($Id, $newStoreName)
    {
        $sql = "UPDATE stores SET storeName = :newStoreName WHERE storeId = :Id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":Id", $Id);
        $stmt->bindParam("newStoreName", $newStoreName);
        $stmt->execute();

    }

    public function addProduct($newProductName, $newProductPrice, $newProductToppings)
    {
        $sql = "INSERT INTO products(productName,productPrice,productToppings) VALUES (:newProductName,:newProductPrice,:newProductToppings)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":newProductName", $newProductName);
        $stmt->bindParam(":newProductPrice", $newProductPrice);
        $stmt->bindParam(":newProductToppings", $newProductToppings);
        $stmt->execute();
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item) {
            $product = new Product ($item["productName"], $item["productPrice"], $item["productToppings"]);
            $product->setProductId($item["productId"]);
            array_push($products, $product);
        }
        return $products;
    }

    public function deleteProduct($Id)
    {
        $sql = "DELETE FROM products WHERE productId = :Id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":Id", $Id);
        $stmt->execute();

    }

    public function getProductById($Id)
    {
        $sql = "SELECT * FROM products WHERE productId = '$Id'";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetch();
        $product = new Product($result["productName"], $result["productPrice"], $result["productToppings"]);
        $product->setProductId($result["productId"]);
        return $product;
    }

    public function editProductById($Id, $newProductName, $newProductPrice, $newProductToppings)
    {
        $sql = "UPDATE products SET productName = :newProductName, productPrice = :newProductPrice, productToppings = :newProductToppings WHERE productId = :Id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":Id", $Id);
        $stmt->bindParam(":newProductName", $newProductName);
        $stmt->bindParam(":newProductPrice", $newProductPrice);
        $stmt->bindParam(":newProductToppings", $newProductToppings);
        $stmt->execute();

    }

    public function getProductInStore($storeId){
        $sql = "SELECT p.* FROM storeProducts sp 
                INNER JOIN products p ON p.productId = sp.productId
                WHERE sp.storeId = '$storeId'";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item){
            $product = new Product($item["productName"],$item["productPrice"],$item["productToppings"]);
            $product->setProductId($item["productId"]);
            array_push($arr,$product);
        }
        return $arr;
    }

    public function addstoreProduct($storeIdAdd,$productIdAdd){
        $sql = "INSERT INTO storeProducts(storeId,productId) VALUES (:storeIdAdd, :productIdAdd)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":storeIdAdd",$storeIdAdd);
        $stmt->bindParam(":productIdAdd",$productIdAdd);
        $stmt->execute();
    }

    public function removeStoreProduct($storeIdRemove,$productIdRemove){
        $sql = "DELETE FROM storeProducts WHERE storeId = :storeIdRemove AND productId = :productIdRemove";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":storeIdRemove",$storeIdRemove);
        $stmt->bindParam(":productIdRemove",$productIdRemove);
        $stmt->execute();
    }


}