<?php

namespace WordlistConsumer;

use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\OptionAlreadyDefinedException;

class ConsumerOptions
{
    /**
     * @var array
     */
    private static $options = [];

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

    /**
     * @param string $option
     * @param array $config
     * @return ConsumerOptions
     */
    public static function addOption(string $option, array $config): ConsumerOptions
    {
        if (self::find($option) !== null)
            throw new OptionAlreadyDefinedException('The option ' . $option . ' is already defined');

        array_push(self::$options, [$option => $config]);
        return new self;
    }

    /**
     * @param string $name
     * @return array
     */
    public static function getOption(string $name): array
    {
        $option = self::find($name);

        if ($option === null)
            throw new OptionNotFoundException('Option ' . $name . ' not found');

        return $option;
    }

    /**
     * @param array $options
     * @return ConsumerOptions
     */
    public static function addOptions(array $options): ConsumerOptions
    {
        foreach ($options as $option => $config)
            self::addOption($option, $config);

        return new self;
    }

    /**
     * @return array
     */
    public static function getOptions(): array
    {
        return self::$options;
    }
}
