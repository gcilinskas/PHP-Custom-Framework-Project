<?php   

    namespace App\Models;

    use App\Models\Property;
    use Doctrine\ORM\Mapping as ORM;


     /**
     * @ORM\Entity
     * @ORM\Table(name="property_value") 
     */
    class PropertyValue
    {
        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        protected $id;
        /**
         * @ORM\Column(name="product_id", type="integer")
         */
        protected $productId;
        /**
         * @ORM\Column(name="property_name", type="string")
         */
        protected $propertyName;
        /**
         * @ORM\Column(name="property_value", type="string")
         */
        protected $propertyValue;
        
        /**
         * Many property values have one product. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="propertyValues")
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
         * Get the value of propertyName
         */ 
        public function getPropertyName()
        {
                return $this->propertyName;
        }

        /**
         * Set the value of propertyName
         *
         * @return  self
         */ 
        public function setPropertyName($propertyName)
        {
                $this->propertyName = $propertyName;

                return $this;
        }

        /**
         * Get the value of propertyValue
         */ 
        public function getPropertyValue()
        {
                return $this->propertyValue;
        }

        /**
         * Set the value of propertyValue
         *
         * @return  self
         */ 
        public function setPropertyValue($propertyValue)
        {
                $this->propertyValue = $propertyValue;

                return $this;
        }
    }