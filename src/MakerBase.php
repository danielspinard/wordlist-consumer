<?php

namespace WordlistConsumer;

use stdClass;
use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\WordlistNotFoundException;
use WordlistConsumer\Interfaces\ConsumerMakerInterface;

abstract class MakerBase implements ConsumerMakerInterface
{
    /**
     * @var object
     */
    protected object $maker;

    /**
     * @var ConsumerOptions
     */
    protected ConsumerOptions $options;

    /**
     * MakerBase constructor.
     *
     * @param ConsumerOptions|null $options
     */
    public function __construct(ConsumerOptions $options = null)
    {
        $this->maker = new stdClass();
        $this->options = $options ?? new ConsumerOptions();
    }

    /**
     * @return ConsumerMakerInterface
     */
    public function make(): ConsumerMakerInterface
    {
        return $this;
    }

    /**
     * @return object
     */
    public function result(): object
    {
        return $this->maker;
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->result());
    }

    /**
     * @param string $name
     * @return object
     * @throws Exceptions\OptionNotFoundException
     */
    protected function option(string $name): object
    {
        return (object) $this->options::getOption($name);
    }

    /**
     * @param string $name
     * @return string
     * @throws Exceptions\OptionNotFoundException
     */
    protected function wordlist(string $name): string
    {
        return $this->option($name)->wordlist;
    }

    /**
     * @param string $name
     * @return string
     * @throws OptionNotFoundException|WordlistNotFoundException
     */
    protected function string(string $name): string
    {
        $wordlist = $this->wordlist($name);
        $consumer = new Consumer($wordlist);

        return ucwords($consumer->row());
    }
}
