<?php


class TeaStoreManager
{
    protected $teaStoreManager;

    public function __construct()
    {
        $db =  new DBConnect("mysql:host=localhost;dbname=tea_store_manager","root","Dieu1988");
        $this->teaStoreManager = new TeaStoresDB($db->connect());
    }

    public function addStore($storeName){
        $this->teaStoreManager->addStore($storeName);
    }

    public function getListStore(){
        return $this->teaStoreManager->getStores();
    }
    public function deleteStore($id){
        $this->teaStoreManager->deleteStore($id);
    }
    public function getStoreById($id){
        return $this->teaStoreManager->getStoreById($id);
    }
    public function editStoreById($id,$storeName){
        $this->teaStoreManager->editStoreById($id,$storeName);
    }

    public function addProduct($productName,$productPrice,$productToppings){
        $this->teaStoreManager->addProduct($productName,$productPrice,$productToppings);
    }

    public function getListProduct(){
        return $this->teaStoreManager->getProducts();
    }
    public function deleteProduct($id){
        $this->teaStoreManager->deleteProduct($id);
    }
    public function getProductById($id){
        return $this->teaStoreManager->getProductById($id);
    }
    public function editProductById($Id, $productName,$productPrice,$productToppings){
        $this->teaStoreManager->editProductById($Id,$productName,$productPrice,$productToppings);
    }

    public function addStoreProduct($storeId,$productId){
        $this->teaStoreManager->addstoreProduct($storeId,$productId);
    }
    public function removeStoreProduct($storeId,$productId){
        $this->teaStoreManager->removeStoreProduct($storeId,$productId);
    }

    public function getProductInStore($storeId){
        return $this->teaStoreManager->getProductInStore($storeId);
    }

    public function getProductNotInStore($storeId){
        $productsInStore =  $this->teaStoreManager->getProductInStore($storeId);
        $products = $this->teaStoreManager->getProducts();
        $arr = [];
            foreach ($products as $product){
                if (in_array($product,$productsInStore))
                    continue;
                array_push($arr,$product);
            }
            return $arr;
    }

}