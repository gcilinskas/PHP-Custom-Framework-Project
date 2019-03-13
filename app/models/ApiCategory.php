<?php 

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="api_category") 
 */
class ApiCategory
{
    /**
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
	 */
    protected $id;
    /**
	 * @ORM\Column(name="api_id", type="integer")
	 */
    protected $api_id;
    /**
	 * @ORM\Column(name="title", type="string")
	 */
    protected $title;

    


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
     * Get the value of api_id
     */ 
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * Set the value of api_id
     *
     * @return  self
     */ 
    public function setApiId($api_id)
    {
        $this->api_id = $api_id;

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
}