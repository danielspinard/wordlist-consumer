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

    /**
     * @return array
     */
    public static function wordlist(): array
    {
        return self::$wordlist;
    }

    /**
     * @return string
     */
    public static function string(): string
    {
        $words = self::wordlist();
        $word = $words[rand(0, count($words) - 1)];

        return ucfirst(str_replace([PHP_EOL, '-'], '', $word));
    }
}
