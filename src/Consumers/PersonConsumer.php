<?php

namespace WordlistConsumer\Consumers;

use WordlistConsumer\Interfaces\ConsumerInterface;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Maker\PersonMaker;

class PersonConsumer implements ConsumerInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var object
     */
    protected $birth;

    /**
     * @var object
     */
    protected $address;

    /**
     * Person constructor
     * 
     * @param ConsumerOptions $option
     */
    public function __construct(ConsumerOptions $consumerOptions = null)
    {
        $this->__make((new PersonMaker)->make($consumerOptions));
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

    /**
     * @param PersonMaker $maker
     * @return Person
     */
    public function __make($maker): Person
    {
        $person = $maker->result();

        foreach ($person as $attribute => $value) {
            $this->__set($attribute, $value);
        }

        return $this;
    }
}
