<?php

namespace WordlistConsumer\Consumers;

use WordlistConsumer\Interfaces\ConsumerInterface;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;
use WordlistConsumer\ConsumerOptions;

class AddressConsumer implements ConsumerInterface
{
    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var int
     */
    protected $geoNameId;

    /**
     * AddressConsumer constructor
     * 
     * @param ConsumerOptions $option
     */
    public function __construct(ConsumerOptions $consumerOptions = null)
    {
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return ConsumerInterface
     */
    public function __set(string $attribute, $value): ConsumerInterface
    {
        $this->$attribute = $value;
        return $this;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return ($this->__isset($attribute) ? $this->$attribute : null);
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function __isset(string $attribute): bool
    {
        return isset($this->$attribute);
    }

    /**
     * @param ConsumerMakerInterface $maker
     * @return ConsumerInterface
     */
    public function __make(ConsumerMakerInterface $maker): ConsumerInterface
    {
        $person = $maker->result();

        foreach ($person as $attribute => $value) {
            $this->__set($attribute, $value);
        }

        return $this;
    }
}