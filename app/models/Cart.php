<?php

namespace App\Models;

use App\Models\User;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


    /**
     * @ORM\Entity 
     * @ORM\Table(name="cart") 
     */
    class Cart
    {
        
        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        protected $id;
        /**
         * @ORM\Column(name="price_total", type="integer")
         */
        protected $priceTotal;
        /**
         * @ORM\Column(name="quantity", type="integer")
         */
        protected $quantity;
        /**
         * @ORM\Column(name="is_purchased", type="integer")
         */
        protected $isPurchased;
        /**
         * @ORM\Column(name="user_id", type="integer")
         */
        protected $userId;


        // relationships

        /**
         * One cart has cart lines. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\CartLine", mappedBy="cart")
         */
        private $cartLines;

        /**
         * Many carts have one user. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\User", inversedBy="carts")
         * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
         */
        private $user;


        public function __construct() {
            $this->cartLines = new ArrayCollection();
        }

        public function getUser(): User
        {
            return $this->user;
        }
        public function setUser(User $user): self
        {
            $this->user = $user;
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

        /**
         * Get the value of isPurchased
         */ 
        public function getIsPurchased()
        {
                return $this->isPurchased;
        }

        /**
         * Set the value of isPurchased
         *
         * @return  self
         */ 
        public function setIsPurchased($isPurchased)
        {
                $this->isPurchased = $isPurchased;

                return $this;
        }
    }