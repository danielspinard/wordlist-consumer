<?php

namespace WordlistConsumer\Interfaces;

use WordlistConsumer\ConsumerOptions;

interface ConsumerMakerInterface
{
    /**
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null);

    /**
     * @return ConsumerMakerInterface
     */
    public function make(): ConsumerMakerInterface;

    /**
     * @return object
     */
    public function result(): object;

    /**
     * @return string
     */
    public function toJson(): string;
}
