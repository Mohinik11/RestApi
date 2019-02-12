<?php

namespace Model;

class Basket implements \Interfaces\ModelInterface
{
    protected $id;
    protected $user_id;
    protected $product_id;
    protected $quantity;
    protected $created;
    protected $updated;

    public function __construct($basket)
    {
        $this->id            = $basket['id'] ?? null;
        $this->user_id       = $basket['user_id'] ?? null;
        $this->product_id    = $basket['product_id'] ?? null;
        $this->quantity      = $basket['quantity'] ?? null;
        $this->created       = $basket['created_on'] ?? date('Y-m-d H:i:s');
                
        if ($this->id) {
            $this->updated = date('Y-m-d H:i:s');
        } else {
           $this->updated = $this->created;
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
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function toArray()
    {
        return [
                    'user_id'    => $this->user_id,
                    'product_id' => $this->product_id,
                    'quantity'   => $this->quantity,
                    'created'    => $this->created,
                    'updated'    => $this->updated
                ];
    }

}
