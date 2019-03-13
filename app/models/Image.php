<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;


    /**
     * @ORM\Entity 
     * @ORM\Table(name="image") 
     */
    class Image
    {
        
        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        protected $id;
        /**
         * @ORM\Column(name="url", type="string")
         */
        protected $url;
        /**
         * @ORM\Column(name="filepath", type="string")
         */
        protected $filepath;
        /**
         * @ORM\Column(name="product_id", type="integer")
         */
        protected $productId;

         /**
         * Many images have one product. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="images")
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
         * Get the value of filepath
         */ 
        public function getFilepath()
        {
                return $this->filepath;
        }

        /**
         * Set the value of filepath
         *
         * @return  self
         */ 
        public function setFilepath($filepath)
        {
                $this->filepath = $filepath;

                return $this;
        }

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }
    }