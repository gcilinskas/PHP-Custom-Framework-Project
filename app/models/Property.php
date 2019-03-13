<?php
 namespace App\Models;

 use Doctrine\ORM\Mapping as ORM;
 use Doctrine\Common\Collections\ArrayCollection;

    /**
     * @ORM\Entity
     * @ORM\Table(name="property") 
     */
    class Property
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
         * @ORM\Column(name="product_id", type="integer")
         */
        protected $productId;
         /**
         * One property has many propertyValues. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\PropertyValue", mappedBy="property")
         */
        private $propertyValues;
        /**
         * Many properties have one product. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="properties")
         * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
         */
        private $product;


        public function __construct() {
            $this->propertyValues = new ArrayCollection();
        }
        
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
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed name
         */
        public function setName($name)
        {
            $this->name = $name;
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