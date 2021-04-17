<?php

namespace WordlistConsumer;

class ConsumerFacade
{
    /**
     * @var array
     */
    private static $wordlist;

    /**
     * @param string $path
     * @return void
     */
    public static function make(string $path)
    {
        self::$wordlist = (new Consumer($path))->open();
    }
}
