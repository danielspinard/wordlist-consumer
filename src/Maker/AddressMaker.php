<?php

namespace WordlistConsumer\Maker;

use WordlistConsumer\Consumer;
use WordlistConsumer\MakerBase;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;
use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\WordlistNotFoundException;

class AddressMaker extends MakerBase
{
    /**
     * AddressMaker constructor.
     *
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        parent::__construct($options);
    }

    /**
     * @return ConsumerMakerInterface
     * @throws OptionNotFoundException|WordlistNotFoundException
     */
    public function make(): ConsumerMakerInterface
    {
        $consumer = new Consumer($this->wordlist('address'));
        $address = explode(',', $consumer->row());
        $this->maker = (object) array_combine(['city', 'country', 'state', 'geoNameId'], $address);

        return $this;
    }
}
