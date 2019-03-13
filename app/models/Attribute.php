<?php

namespace App\Models;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="attribute") 
 */
class Attribute
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
     * @ORM\Column(name="value", type="string")
     */
    protected $value;
    /**
     * @ORM\Column(name="product_id", type="integer")
     */
    protected $productId;

    /**
     * Many attributes have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="attributes")
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
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

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
}