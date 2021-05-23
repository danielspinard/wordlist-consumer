<?php

namespace WordlistConsumer;

use WordlistConsumer\Exceptions\OptionNotFoundException;
use WordlistConsumer\Exceptions\OptionAlreadyDefinedException;

class ConsumerOptions
{
    /**
     * @var array
     */
    private static array $options = [];

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
     * @param array $options
     * @return ConsumerOptions
     * @throws OptionAlreadyDefinedException
     */
    public static function create(array $options = []): ConsumerOptions
    {
        if ($options !== null) {
            self::addOptions($options);
        }

        return new self;
    }

    /**
     * @param string $option
     * @param array $config
     * @return ConsumerOptions
     * @throws OptionAlreadyDefinedException
     */
    public static function addOption(string $option, array $config): ConsumerOptions
    {
        if (self::find($option) !== null) {
            throw new OptionAlreadyDefinedException('The option ' . $option . ' is already defined');
        }

        array_push(self::$options, [$option => $config]);
        return new self;
    }

    /**
     * @param string $name
     * @return array
     * @throws OptionNotFoundException
     */
    public static function getOption(string $name): array
    {
        $option = self::find($name);

        if ($option === null) {
            throw new OptionNotFoundException('Option ' . $name . ' not found');
        }

        return $option[$name];
    }

    /**
     * @param array $options
     * @return ConsumerOptions
     * @throws OptionAlreadyDefinedException
     */
    public static function addOptions(array $options): ConsumerOptions
    {
        foreach ($options as $option => $config) {
            self::addOption($option, $config);
        }

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
