<?php

namespace WordlistConsumer;

use WordlistConsumer\Interfaces\ConsumerInterface;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;

abstract class ConsumerBase implements ConsumerInterface
{
    /**
     * @var ConsumerOptions
     */
    protected ConsumerOptions $options;

    /**
     * ConsumerBase constructor
     *
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        $this->options = $options ?? new ConsumerOptions();
    }

    /**
     * @param string $attribute
     * @return mixed
     */
    public function __get(string $attribute)
    {
        return ($this->__isset($attribute) ? $this->$attribute : null);
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
        $object = $maker->make($this->options)->result();

        foreach ($object as $attribute => $value) {
            $this->__set($attribute, $value);
        }

        return $this;
    }
}
