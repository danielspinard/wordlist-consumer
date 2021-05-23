<?php

namespace WordlistConsumer\Interfaces;

use WordlistConsumer\ConsumerOptions;

interface ConsumerInterface
{
    /**
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null);

    /**
     * @param string $attribute
     * @param mixed $value
     * @return ConsumerInterface
     */
    public function __set(string $attribute, $value): ConsumerInterface;

    /**
     * @param string $attribute
     * @return mixed
     */
    public function __get(string $attribute);

    /**
     * @param string $attribute
     * @return bool
     */
    public function __isset(string $attribute): bool;

    /**
     * @param ConsumerMakerInterface $maker
     * @return ConsumerInterface
     */
    public function __make(ConsumerMakerInterface $maker): ConsumerInterface;
}
