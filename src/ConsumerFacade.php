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

    /**
     * @param int $size
     * @param string $delimiter
     * @return string
     */
    public static function strings(int $size, string $delimiter = ' '): string
    {
        $string = self::string();

        for ($counter = 1; $counter < $size; $counter++)
            $string .= $delimiter . self::string();

        return $string;
    }
}
