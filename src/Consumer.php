<?php

namespace WordlistConsumer;

use WordlistConsumer\Exceptions\WordlistNotFoundException;

class Consumer
{
    /**
     * @var string
     */
    private string $path;

    /**
     * Consumer constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return bool
     */
    private function exists(): bool
    {
        return file_exists($this->path);
    }

    /**
     * @return array
     * @throws WordlistNotFoundException
     */
    public function open(): array
    {
        if (!$this->exists()) {
            throw new WordlistNotFoundException('Wordlist file not found in ' . $this->path);
        }

        return file($this->path);
    }
}
