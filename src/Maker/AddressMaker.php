<?php

namespace WordlistConsumer\Maker;

use stdClass;
use WordlistConsumer\Consumer;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;
use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\WordlistNotFoundException;

class AddressMaker implements ConsumerMakerInterface
{
    /**
     * @var object
     */
    private object $address;

    /**
     * @return object
     */
    public function result(): object
    {
        return $this->address;
    }

    /**
     * @param ConsumerOptions $consumerOptions
     * @return ConsumerMakerInterface
     * @throws OptionNotFoundException
     * @throws WordlistNotFoundException
     */
    public function make(ConsumerOptions $consumerOptions): ConsumerMakerInterface
    {
        $options = $consumerOptions::getOption('address');
        $row = (new Consumer($options['wordlist']))->row();
        $this->address = $this->makeAddress(explode(',', $row));

        return $this;
    }

    /**
     * @param array $row
     * @return object
     */
    private function makeAddress(array $row): object
    {
        $address = new stdClass();
        $address->city = $row[0];
        $address->country = $row[1];
        $address->state = $row[2];
        $address->geoNameId = $row[3];

        return $address;
    }
}
