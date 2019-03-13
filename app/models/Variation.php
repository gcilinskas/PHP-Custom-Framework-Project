<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="variation") 
 */
class Variation
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    protected $id;
    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    /**
     * @ORM\Column(name="retailer_price", type="integer")
     */
    protected $retailerPrice;
    /**
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;
    /**
     * @ORM\Column(name="stock", type="integer")
     */
    protected $stock;
    /**
     * @ORM\Column(name="image_url", type="string")
     */
    protected $imageUrl;
    /**
     * @ORM\Column(name="product_id", type="integer")
     */
    protected $productId;
    /**
     * @ORM\Column(name="currency", type="string")
     */
    protected $currency;

    /**
     * Many variations have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="variations")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;


    public function getProduct(): Product
    {
        return $this->product;
    }
    public function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of retailerPrice
     */ 
    public function getRetailerPrice()
    {
        return $this->retailerPrice;
    }

    /**
     * Set the value of retailerPrice
     *
     * @return  self
     */ 
    public function setRetailerPrice($retailerPrice)
    {
        $this->retailerPrice = $retailerPrice;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of imageUrl
     */ 
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set the value of imageUrl
     *
     * @return  self
     */ 
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get the value of productId
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set the value of productId
     *
     * @return  self
     */ 
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get the value of currency
     */ 
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */ 
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }
}