<?php

namespace Model;

class Product implements \Interfaces\ModelInterface
{
    protected $id;
    protected $name;
    protected $price;
    protected $created;
    protected $updated;

    public function __construct($product)
    {
        $this->id            = $product['id'] ?? null;
        $this->name       = $product['name'] ?? null;
        $this->product_id    = $product['product_id'] ?? null;
        $this->price      = $product['price'] ?? null;
        $this->created       = $product['created'] ?? date('Y-m-d H:i:s')
        if ($this->id) {
            $this->updated = date('Y-m-d H:i:s');
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}
