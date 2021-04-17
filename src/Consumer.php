<?php

namespace WordlistConsumer;

use WordlistConsumer\Exceptions\WordlistNotFoundException;

class Consumer
{
    /**
     * @var string
     */
    private static $path;

    /**
     * @return bool
     */
    private static function exists(): bool
    {
        return file_exists(self::$path);
    }

    /**
     * @return array
     */
    public static function open(): array
    {
        return file(self::$path);
    }
}
