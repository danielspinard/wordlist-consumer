<?php

namespace WordlistConsumer;

use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\OptionAlreadyDefinedException;

class ConsumerOptions
{
    /**
     * @var array
     */
    private static $options;

    /**
     * @param string $name
     * @return array|null
     */
    private static function find(string $name): ?array
    {
        foreach (self::getOptions() as $option) {
            if ($name === key($option)) {
                return $option;
            }
        }

        return null;
    }
}
