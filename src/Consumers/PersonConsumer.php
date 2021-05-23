<?php

namespace WordlistConsumer\Consumers;

use WordlistConsumer\ConsumerBase;
use WordlistConsumer\ConsumerOptions;
use WordlistConsumer\Maker\PersonMaker;

class PersonConsumer extends ConsumerBase
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $surname;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var int
     */
    protected int $age;

    /**
     * @var object
     */
    protected object $birth;

    /**
     * @var object
     */
    protected object $address;

    /**
     * Person constructor
     *
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        parent::__construct($options);
        $this->__make(new PersonMaker());
    }
}
