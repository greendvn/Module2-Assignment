<?php


class Product
{
    protected $productId;
    protected $productName;
    protected $productPrice;
    protected $productToppings;

    public function __construct($productName,$productPrice,$productToppings)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productToppings = $productToppings;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
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
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * @return mixed
     */
    public function getProductToppings()
    {
        return $this->productToppings;
    }

}