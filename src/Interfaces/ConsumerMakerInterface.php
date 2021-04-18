<?php

namespace WordlistConsumer\Interfaces;

use WordlistConsumer\ConsumerOptions;

interface ConsumerMakerInterface
{
    /**
     * @param ConsumerOptions $options
     * @return ConsumerMakerInterface
     */
    public function reset(ConsumerOptions $options = null): ConsumerMakerInterface;

    /**
     * @param ConsumerOptions $options
     * @return ConsumerMakerInterface
     */
    public function make(ConsumerOptions $options = null): ConsumerMakerInterface;

    /**
     * @return object
     */
    public function result(): object;
}
