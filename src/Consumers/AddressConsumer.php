<?php

namespace WordlistConsumer\Consumers;

use WordlistConsumer\ConsumerBase;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Maker\AddressMaker;

class AddressConsumer extends ConsumerBase
{
    /**
     * @var string
     */
    protected string $city;

    /**
     * @var string
     */
    protected string $state;

    /**
     * @var string
     */
    protected string $country;

    /**
     * @var int
     */
    protected int $geoNameId;

    /**
     * AddressConsumer constructor
     *
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        parent::__construct($options);
        $this->__make(new AddressMaker());
    }
}
