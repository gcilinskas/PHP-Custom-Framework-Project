<?php 

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="category") 
 */
class Category
{
    /**
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Id 
     * @ORM\Column(name="id", type="integer", nullable=false)
	 */
    private $id;
    /**
	 * @ORM\Column(name="title", type="string")
	 */
    private $title;
     /**
	 * @ORM\Column(name="description", type="string")
	 */
    private $description;

    /**
     * One category has many products. This is the inverse side.
     * @ORM\OneToMany(targetEntity="App\Models\Product", mappedBy="category")
     */
    private $products;

    public function __construct() {
        $this->products = new ArrayCollection();
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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}