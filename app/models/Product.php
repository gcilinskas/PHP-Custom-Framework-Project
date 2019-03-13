<?php

namespace App\Models;

use App\Models\Category;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
    

    /**
     * App\Models\Product
     * 
     * @ORM\Entity
     * @ORM\Table(name="product") 
     */
    class Product
    {

        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        protected $id;
        /**
         * @ORM\Column(name="retailer_product_id", type="string")
         */
        protected $retailerProductId;
        /**
         * @ORM\Column(name="seller_id", type="integer")
         */
        protected $sellerId;
        /**
         * ORM\Column(name="detail_url", type="string")
         */
        protected $detailUrl;
        /**
         * @ORM\Column(name="title", type="string")
         */
        protected $title;
        /**
         * @ORM\Column(name="category_id", type="integer")
         */
        protected $categoryId;

        /**
         * @ORM\Column(name="price", type="integer")
         */
        protected $price;

        /**
         * @ORM\Column(name="retailer_price", type="integer")
         */
        protected $retailerPrice;

        /**
         * @ORM\Column(name="currency", type="string")
         */
        protected $currency;
        /**
         * @ORM\Column(name="stock", type="integer")
         */
        protected $stock;
        /**
         * @ORM\Column(name="description", type="string")
         */
        protected $description;
        /**
         * @ORM\Column(name="is_live", type="integer")
         */
        protected $isLive;
        /**
         * @ORM\Column(name="company_id", type="integer")
         */
        protected $companyId;
        /**
         * @ORM\Column(name="image_url", type="string")
         */
        protected $imageUrl;



        // relationships

        /**
         * One product has many images. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\Image", mappedBy="product")
         */
        private $images;

        /**
         * One product has many shippingServices. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\ShippingServices", mappedBy="product")
         */
        private $shippingServices;

        /**
         * One product has many propertyValues. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\PropertyValue", mappedBy="product")
         */
        private $propertyValues;

        /**
         * One product has many variations. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\Variation", mappedBy="product")
         */
        private $variations;
        
        /**
         * One product has many attributes. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\Attribute", mappedBy="product")
         */
        private $attributes;

        /**
         * Many products have one category. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Category", inversedBy="products")
         * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
         */
        private $category;


        public function __construct() {
            $this->images = new ArrayCollection();
            $this->shippingServices = new ArrayCollection();
            $this->propertyValues = new ArrayCollection();
            $this->variations = new ArrayCollection();
            $this->attributes = new ArrayCollection();
        }


        public function getCategory(): Category
        {
            return $this->category;
        }
        public function setCategory(Category $category): self
        {
            $this->category = $category;
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
        public function getSellerId()
        {
            return $this->sellerId;
        }

        /**
         * @param mixed $sellerId
         */
        public function setSellerId($sellerId)
        {
            $this->sellerId = $sellerId;
        }

        /**
         * @return mixed
         */
        public function getDetailUrl()
        {
            return $this->detailUrl;
        }

        /**
         * @param mixed $detailUrl
         */
        public function setDetailUrl($detailUrl)
        {
            $this->detailUrl = $detailUrl;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->categoryId;
        }

        /**
         * @param mixed $categoryId
         */
        public function setCategoryId($categoryId)
        {
            $this->categoryId = $categoryId;
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

        /**
         * @return mixed
         */
        public function getCurrency()
        {
            return $this->currency;
        }

        /**
         * @param mixed $currency
         */
        public function setCurrency($currency)
        {
            $this->currency = $currency;
        }

        /**
         * @return mixed
         */
        public function getStock()
        {
            return $this->stock;
        }

        /**
         * @param mixed $stock
         */
        public function setStock($stock)
        {
            $this->stock = $stock;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }






        /**
         * Get the value of isLive
         */ 
        public function getIsLive()
        {
                return $this->isLive;
        }

        /**
         * Set the value of isLive
         *
         * @return  self
         */ 
        public function setIsLive($isLive)
        {
                $this->isLive = $isLive;

                return $this;
        }

        /**
         * Get the value of companyId
         */ 
        public function getCompanyId()
        {
                return $this->companyId;
        }

        /**
         * Set the value of companyId
         *
         * @return  self
         */ 
        public function setCompanyId($companyId)
        {
                $this->companyId = $companyId;

                return $this;
        }

        /**
         * Get the value of retailerProductId
         */ 
        public function getRetailerProductId()
        {
                return $this->retailerProductId;
        }

        /**
         * Set the value of retailerProductId
         *
         * @return  self
         */ 
        public function setRetailerProductId($retailerProductId)
        {
                $this->retailerProductId = $retailerProductId;

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

    }