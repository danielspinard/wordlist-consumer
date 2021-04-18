<?php

namespace WordlistConsumer\Consumers;

use WordlistConsumer\Interfaces\ConsumerInterface;
use WordlistConsumer\ConsumerOptions;

class Person implements ConsumerInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $age;

    /**
     * @var object
     */
    private $birth;

    /**
     * @var object
     */
    private $address;

    /**
     * @param ConsumerOptions $option
     */
    public function __construct(ConsumerOptions $option = null)
    {
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return Person
     */
    public function __set(string $attribute, $value): Person
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
}
