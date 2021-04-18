<?php

namespace WordlistConsumer\Interfaces;

use WordlistConsumer\ConsumerOptions;

interface ConsumerMakerInterface
{
    /**
     * @return ConsumerMakerInterface
     */
    public function reset(): ConsumerMakerInterface;

    /**
     * @param ConsumerOptions|null $options
     * @return ConsumerMakerInterface
     */
    public function make(ConsumerOptions $options = null): ConsumerMakerInterface;

    /**
     * @return object
     */
    public function result(): object;
}
