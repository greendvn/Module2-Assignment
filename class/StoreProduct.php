<?php


class storeProduct
{
    protected $storeProductId;
    protected $storeId;
    protected $productId;

    public function __construct($storeId,$productId)
    {
        $this->storeId = $storeId;
        $this->productId = $productId;
    }

    /**
     * @param mixed $storeProductId
     */
    public function setStoreProductId($storeProductId)
    {
        $this->storeProductId = $storeProductId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * @return mixed
     */
    public function getStoreProductId()
    {
        return $this->storeProductId;
    }

}