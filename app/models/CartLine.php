<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use Doctrine\ORM\Mapping as ORM;


    /**
     * @ORM\Entity 
     * @ORM\Table(name="cart_line") 
     */
    class CartLine
    {
        
        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        protected $id;
        /**
         * @ORM\Column(name="cart_id", type="integer")
         */
        protected $cartId;
        /**
         * @ORM\Column(name="product_id", type="integer")
         */
        protected $productId;
        /**
         * @ORM\Column(name="price_total", type="integer")
         */
        protected $priceTotal;
        /**
         * @ORM\Column(name="quantity", type="integer")
         */
        protected $quantity;

         /**
         * Many cart lines have one cart. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Cart", inversedBy="cartLines")
         * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
         */
        private $cart;

        /**
         * One CartLine has One Product.
         * @ORM\OneToOne(targetEntity="Product")
         * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
         */
        private $product;

        public function getCart(): Cart
        {
            return $this->cart;
        }
        public function setCart(Cart $cart): self
        {
            $this->cart = $cart;
            return $this;
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
         * Get the value of cartId
         */ 
        public function getCartId()
        {
                return $this->cartId;
        }

        /**
         * Set the value of cartId
         *
         * @return  self
         */ 
        public function setCartId($cartId)
        {
                $this->cartId = $cartId;

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
         * Get the value of priceTotal
         */ 
        public function getPriceTotal()
        {
                return $this->priceTotal;
        }

        /**
         * Set the value of priceTotal
         *
         * @return  self
         */ 
        public function setPriceTotal($priceTotal)
        {
                $this->priceTotal = $priceTotal;

                return $this;
        }

        /**
         * Get the value of quantity
         */ 
        public function getQuantity()
        {
                return $this->quantity;
        }

        /**
         * Set the value of quantity
         *
         * @return  self
         */ 
        public function setQuantity($quantity)
        {
                $this->quantity = $quantity;

                return $this;
        }
    }