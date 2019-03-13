<?php
/**
 * PromotionOption
 *
 * PHP version 5
 *
 * @category Class
 * @package  AliseeksApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Aliseeks API
 *
 * AliExpress product searching and product details retrieval API.
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 3.3.4
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AliseeksApi\Model;

use \ArrayAccess;
use \AliseeksApi\ObjectSerializer;

/**
 * PromotionOption Class Doc Comment
 *
 * @category Class
 * @description A promotion option
 * @package  AliseeksApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PromotionOption implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PromotionOption';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'max_amount' => '\AliseeksApi\Model\Amount',
        'min_amount' => '\AliseeksApi\Model\Amount',
        'discount' => 'double',
        'time_left' => '\AliseeksApi\Model\TimeDuration',
        'stock' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'max_amount' => null,
        'min_amount' => null,
        'discount' => 'double',
        'time_left' => null,
        'stock' => 'int32'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'max_amount' => 'maxAmount',
        'min_amount' => 'minAmount',
        'discount' => 'discount',
        'time_left' => 'timeLeft',
        'stock' => 'stock'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'max_amount' => 'setMaxAmount',
        'min_amount' => 'setMinAmount',
        'discount' => 'setDiscount',
        'time_left' => 'setTimeLeft',
        'stock' => 'setStock'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'max_amount' => 'getMaxAmount',
        'min_amount' => 'getMinAmount',
        'discount' => 'getDiscount',
        'time_left' => 'getTimeLeft',
        'stock' => 'getStock'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['max_amount'] = isset($data['max_amount']) ? $data['max_amount'] : null;
        $this->container['min_amount'] = isset($data['min_amount']) ? $data['min_amount'] : null;
        $this->container['discount'] = isset($data['discount']) ? $data['discount'] : null;
        $this->container['time_left'] = isset($data['time_left']) ? $data['time_left'] : null;
        $this->container['stock'] = isset($data['stock']) ? $data['stock'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets max_amount
     *
     * @return \AliseeksApi\Model\Amount|null
     */
    public function getMaxAmount()
    {
        return $this->container['max_amount'];
    }

    /**
     * Sets max_amount
     *
     * @param \AliseeksApi\Model\Amount|null $max_amount max_amount
     *
     * @return $this
     */
    public function setMaxAmount($max_amount)
    {
        $this->container['max_amount'] = $max_amount;

        return $this;
    }

    /**
     * Gets min_amount
     *
     * @return \AliseeksApi\Model\Amount|null
     */
    public function getMinAmount()
    {
        return $this->container['min_amount'];
    }

    /**
     * Sets min_amount
     *
     * @param \AliseeksApi\Model\Amount|null $min_amount min_amount
     *
     * @return $this
     */
    public function setMinAmount($min_amount)
    {
        $this->container['min_amount'] = $min_amount;

        return $this;
    }

    /**
     * Gets discount
     *
     * @return double|null
     */
    public function getDiscount()
    {
        return $this->container['discount'];
    }

    /**
     * Sets discount
     *
     * @param double|null $discount The amount of the discount
     *
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->container['discount'] = $discount;

        return $this;
    }

    /**
     * Gets time_left
     *
     * @return \AliseeksApi\Model\TimeDuration|null
     */
    public function getTimeLeft()
    {
        return $this->container['time_left'];
    }

    /**
     * Sets time_left
     *
     * @param \AliseeksApi\Model\TimeDuration|null $time_left time_left
     *
     * @return $this
     */
    public function setTimeLeft($time_left)
    {
        $this->container['time_left'] = $time_left;

        return $this;
    }

    /**
     * Gets stock
     *
     * @return int|null
     */
    public function getStock()
    {
        return $this->container['stock'];
    }

    /**
     * Sets stock
     *
     * @param int|null $stock The amount of stock left on an item
     *
     * @return $this
     */
    public function setStock($stock)
    {
        $this->container['stock'] = $stock;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}

