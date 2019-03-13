<?php 
	namespace App\Models;

	use Doctrine\ORM\Mapping as ORM;

	/**
     * @ORM\Entity
	 * @ORM\Table(name="shipping_services") 
     */
	class ShippingServices
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
		 * @ORM\Column(name="company", type="string")
		 */
		protected $company;
		/**
		 * @ORM\Column(name="service_name", type="string")
		 */
		protected $serviceName;
		/**
		 * @ORM\Column(name="tracking", type="integer")
		 */
		protected $tracking;
		/**
		 * @ORM\Column(name="price", type="integer")
		 */
		protected $price;
		/**
		 * @ORM\Column(name="currency", type="string")
		 */
		protected $currency;
		/**
		 * @ORM\Column(name="commit_days", type="integer")
		 */
		protected $commitDays;
		/**
		 * @ORM\Column(name="ships_from", type="string")
		 */
		protected $shipsFrom;
		/**
		 * @ORM\Column(name="delivery_time_from", type="integer")
		 */
		protected $deliveryTimeFrom;
		/**
		 * @ORM\Column(name="delivery_time_to", type="integer")
		 */
		protected $deliveryTimeTo;

		/**
         * Many shipping services have one product. This is the owning side.
         * @ORM\ManyToOne(targetEntity="App\Models\Product", inversedBy="shippingServices")
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
		 * Get the value of company
		 */ 
		public function getCompany()
		{
				return $this->company;
		}

		/**
		 * Set the value of company
		 *
		 * @return  self
		 */ 
		public function setCompany($company)
		{
				$this->company = $company;

				return $this;
		}

		/**
		 * Get the value of serviceName
		 */ 
		public function getServiceName()
		{
				return $this->serviceName;
		}

		/**
		 * Set the value of serviceName
		 *
		 * @return  self
		 */ 
		public function setServiceName($serviceName)
		{
				$this->serviceName = $serviceName;

				return $this;
		}

		/**
		 * Get the value of price
		 */ 
		public function getPrice()
		{
				return $this->price;
		}

		/**
		 * Set the value of price
		 *
		 * @return  self
		 */ 
		public function setPrice($price)
		{
				$this->price = $price;
				return $this;
		}

		/**
		 * Get the value of currency
		 */ 
		public function getCurrency()
		{
				return $this->currency;
		}

		/**
		 * Set the value of currency
		 *
		 * @return  self
		 */ 
		public function setCurrency($currency)
		{
				$this->currency = $currency;

				return $this;
		}



		/**
		 * Get the value of tracking
		 */ 
		public function getTracking()
		{
				return $this->tracking;
		}

		/**
		 * Set the value of tracking
		 *
		 * @return  self
		 */ 
		public function setTracking($tracking)
		{
				$this->tracking = $tracking;

				return $this;
		}

		/**
		 * Get the value of commitDays
		 */ 
		public function getCommitDays()
		{
				return $this->commitDays;
		}

		/**
		 * Set the value of commitDays
		 *
		 * @return  self
		 */ 
		public function setCommitDays($commitDays)
		{
				$this->commitDays = $commitDays;

				return $this;
		}

		/**
		 * Get the value of shipsFrom
		 */ 
		public function getShipsFrom()
		{
				return $this->shipsFrom;
		}

		/**
		 * Set the value of shipsFrom
		 *
		 * @return  self
		 */ 
		public function setShipsFrom($shipsFrom)
		{
				$this->shipsFrom = $shipsFrom;

				return $this;
		}

		/**
		 * Get the value of deliveryTimeFrom
		 */ 
		public function getDeliveryTimeFrom()
		{
				return $this->deliveryTimeFrom;
		}

		/**
		 * Set the value of deliveryTimeFrom
		 *
		 * @return  self
		 */ 
		public function setDeliveryTimeFrom($deliveryTimeFrom)
		{
				$this->deliveryTimeFrom = $deliveryTimeFrom;

				return $this;
		}

		/**
		 * Get the value of deliveryTimeTo
		 */ 
		public function getDeliveryTimeTo()
		{
				return $this->deliveryTimeTo;
		}

		/**
		 * Set the value of deliveryTimeTo
		 *
		 * @return  self
		 */ 
		public function setDeliveryTimeTo($deliveryTimeTo)
		{
				$this->deliveryTimeTo = $deliveryTimeTo;

				return $this;
		}
	}