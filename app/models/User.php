<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


    /**
     * @ORM\Entity 
     * @ORM\Table(name="user") 
     */
    class User
    {

        /**
         * @ORM\GeneratedValue(strategy="AUTO")
         * @ORM\Id
         * @ORM\Column(name="id", type="integer", nullable=false)
         */
        private $id;
        /**
         * @ORM\Column(name="email", type="string")
         */
        private $email;
        /**
         * @ORM\Column(name="password", type="string")
         */
        private $password;
        /**
         * @ORM\Column(name="is_admin", type="integer")
         */
        private $isAdmin;

        /**
         * One user has many carts. This is the inverse side.
         * @ORM\OneToMany(targetEntity="App\Models\Cart", mappedBy="user")
         */
        private $carts;

        public function __construct() {
            $this->carts = new ArrayCollection();
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
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of isAdmin
         */ 
        public function getIsAdmin()
        {
                return $this->isAdmin;
        }

        /**
         * Set the value of isAdmin
         *
         * @return  self
         */ 
        public function setIsAdmin($isAdmin)
        {
                $this->isAdmin = $isAdmin;

                return $this;
        }
    }