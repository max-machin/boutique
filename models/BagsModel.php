<?php

class bagsModel extends Model
{

    protected $id;
    protected $id_user;
    protected $id_product;
    protected $price_product;
    protected $quantity_product;

    public function __construct()
    {
        $this->table = "bags";

    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_users
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_products
     */ 
    public function getId_product()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_products
     *
     * @return  self
     */ 
    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantity_product()
    {
        return $this->quantity_product;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantity_product($quantity_product)
    {
        $this->quantity_product = $quantity_product;

        return $this;
    }
}